<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Table</title>
  <link rel="stylesheet" href="{{ asset('css/billings.css') }}">
  
</head>
<body>
    <h1 style="font-family: Arial; font-weight: lighter; color: #4a90e2;">Payments</h1>

    <!-- Add Payment Button -->
    <button class="add-payment-btn" id="addPaymentBtn">+ Add Payment</button>
    
    <input type="text" id="searchInput" placeholder="Search..." onkeyup="searchRecords()">

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table id="recordsTable">
        <thead>
            <tr>
                <th>Patient ID</th>
                <th>Owner's Name</th>
                <th>Pet's Name</th>
                <th>Contact Number</th>
                <th>Payment Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($invoices as $invoice)
            <tr class="clickable-row" data-owner-name="{{ $invoice->owner_name }}" 
                data-pet-name="{{ $invoice->pet_name }}" data-breed="{{ $invoice->breed }}" 
                data-service="{{ $invoice->service_description }}" data-cost="{{ $invoice->cost_per_service }}" 
                data-status="{{ $invoice->payment_status }}">
                <td>{{ $invoice->patient_id }}</td>
                <td>{{ $invoice->owner_name }}</td>
                <td>{{ $invoice->pet_name }}</td>
                <td>{{ $invoice->contact_number }}</td>
                <td>{{ $invoice->payment_status }}</td>
                <td>
                    <!-- Use form for DELETE method -->
                    <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button id="deletebtn" type="submit" class="delete-btn"
                                onclick="return confirm('Are you sure you want to delete this record?');">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Payment Modal -->
    <div id="paymentModal" class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>

            <form id="paymentForm" action="{{ route('invoice.store') }}" method="POST">
    @csrf
                <div class="form-section">
                    <div>
                        <h3>Client Information</h3>
                        <label>Owner's Name:</label>
                        <input type="text" name="owner_name" placeholder="Enter owner's name" required>
                        <label>Contact Number:</label>
                        <input type="tel" name="contact_number" placeholder="Enter contact number" required>
                        <label>Email:</label>
                        <input type="email" name="email" placeholder="Enter email address">
                    </div>
                    <div>
                        <h3>Patient Information</h3>
                        <label>Patient ID:</label>
                        <input type="text" name="patient_id" placeholder="Enter patient ID" required>
                        <label>Pet Name:</label>
                        <input type="text" name="pet_name" placeholder="Enter pet's name" required>
                        <label>Species/Breed:</label>
                        <input type="text" name="breed" placeholder="Enter species or breed" required>
                        <label>Service Date:</label>
                        <input type="date" name="service_date" required>
                    </div>
                </div>
                <div class="form-section">
                    <div>
                        <h3>Service Details</h3>
                        <label>Service Description:</label>
                        <input type="text" name="service_description" placeholder="Enter service description" required>
                        <label>Cost per Service:</label>
                        <input type="number" name="cost_per_service" step="0.01" placeholder="Enter cost per service" required>
                        <label>Quantity:</label>
                        <input type="number" name="quantity" value="1" required>
                    </div>
                    <div>
                        <h3>Medications/Products</h3>
                        <label>Product/Medication Name:</label>
                        <input type="text" name="medication_name" placeholder="Enter product or medication name">
                        <label>Unit Cost:</label>
                        <input type="number" name="unit_cost" step="0.01" placeholder="Enter unit cost">
                        <label>Quantity:</label>
                        <input type="number" name="medication_quantity" value="1">
                    </div>
                </div>

                <label>Payment Status:</label>
                <select class="status" name="payment_status" required>
                    <option value="Paid">Paid</option>
                    <option value="Unpaid">Unpaid</option>
                    <option value="Partially Paid">Partially Paid</option>
                </select>
                <button id="submitbtn" type="submit">Submit Payment</button>
            </form>
        </div>
    </div>

    <!-- Payment Details Modal (for viewing) -->
    <div id="modall" class="modall">
        <div class="modal-contents">
            <span class="closed">&times;</span>
            <h3>Payment Details</h3>
            <p><strong>Owner Name:</strong> <span id="modal-owner-name"></span></p>
            <p><strong>Pet Name:</strong> <span id="modal-pet-name"></span></p>
            <p><strong>Breed:</strong> <span id="modal-breed"></span></p>
            <p><strong>Service:</strong> <span id="modal-service"></span></p>
            <p><strong>Cost per Service:</strong> <span id="modal-cost"></span></p>
            <p><strong>Service Quantity:</strong> <span id="modal-service-quantity"></span></p>
            <p><strong>Medication Name:</strong> <span id="modal-medication-name"></span></p>
            <p><strong>Unit Cost:</strong> <span id="modal-unit-cost"></span></p>
            <p><strong>Medication Quantity:</strong> <span id="modal-medication-quantity"></span></p>
            <p><strong>Status:</strong> <span id="modal-status"></span></p>
        </div>
    </div>

    <script>
        // Open and close the payment modal
        const addPaymentBtn = document.getElementById('addPaymentBtn');
        const paymentModal = document.getElementById('paymentModal');
        const closeModal = document.getElementById('closeModal');
        const closeBtn = document.querySelector('.closed');
        
        // Open the modal when clicking "Add Payment" button
        addPaymentBtn.onclick = function() {
            paymentModal.style.display = "block";
        }

        // Close the modal when clicking the close icon
        closeModal.onclick = function() {
            paymentModal.style.display = "none";
        }

        // Close the payment details modal
        closeBtn.onclick = function() {
            document.getElementById('modall').style.display = "none";
        }

        // Search functionality for the records table
        function searchRecords() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const tableRows = document.querySelectorAll('#recordsTable tbody tr');

            tableRows.forEach(row => {
                const cells = row.getElementsByTagName('td');
                let rowContainsSearchTerm = false;

                for (let cell of cells) {
                    if (cell.innerText.toLowerCase().includes(searchInput)) {
                        rowContainsSearchTerm = true;
                        break;
                    }
                }

                row.style.display = rowContainsSearchTerm ? '' : 'none';
            });
        }
    </script>
</body>
</html>
