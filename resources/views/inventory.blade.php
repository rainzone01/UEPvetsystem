<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="{{ asset('css/inventory.css') }}">
</head>
<body>

    <div class="container">
        <h1>Inventory</h1>
        <div class="buttons">
            <button id="btnMedicines" onclick="showTable('medicinesTable', 'addMedicineBtn')">Medicines</button>
            <button id="btnResources" onclick="showTable('resourcesTable', 'addResourcesBtn')">Resources</button>
        </div>

        <!-- Add Medicine Button -->
        <div id="addMedicineBtn" class="add-btn-container" style="display: none;">
            <button id="btnAddMedicine" onclick="openModal('medicineModal')">Add Medicine</button>
        </div>

        <!-- Medicines Table -->
        <table id="medicinesTable" class="inventory-table" style="display: none;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Dosage</th>
                    <th>Type</th>
                    <th>Prescription</th>
                    <th>Medication</th>
                    <th>Expiration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicines as $medicine)
                    <tr>
                        <td>{{ $medicine->name }}</td>
                        <td>{{ $medicine->quantity }}</td>
                        <td>{{ $medicine->unit }}</td>
                        <td>{{ $medicine->dosage }}</td>
                        <td>{{ $medicine->type }}</td>
                        <td>{{ $medicine->prescription }}</td>
                        <td>{{ $medicine->medication }}</td>
                        <td>{{ $medicine->expiration_date }}</td>
                        <td>
                            <form action="{{ route('delete.medicine', $medicine->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Add Resources Button -->
        <div id="addResourcesBtn" class="add-btn-container" style="display: none;">
            <button id="btnAddResources" onclick="openModal('resourcesModal')">Add Resources</button>
        </div>

        <!-- Resources Table -->
        <table id="resourcesTable" class="inventory-table" style="display: none;">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Prescription</th>
                    <th>Expiration Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resources as $resource)
                    <tr>
                        <td>{{ $resource->name }}</td>
                        <td>{{ $resource->quantity }}</td>
                        <td>{{ $resource->unit }}</td>
                        <td>{{ $resource->prescription }}</td>
                        <td>{{ $resource->expiration_date }}</td>
                        <td>
                            <form action="{{ route('delete.resource', $resource->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

    <!-- Medicine Modal Form -->
    <div id="medicineModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('medicineModal')">&times;</span>
            <h2>Add Medicine</h2>
            <form id="medicineForm" action="{{ route('add.medicine') }}" method="POST">
                @csrf
                <label for="medName">Name:</label>
                <input type="text" id="medName" name="medName" required><br>

                <label for="medQuantity">Quantity:</label>
                <input type="number" id="medQuantity" name="medQuantity" required><br>

                <label for="medUnit">Unit:</label>
                <input type="text" id="medUnit" name="medUnit" required><br>

                <label for="medDosage">Dosage:</label>
                <input type="text" id="medDosage" name="medDosage" required><br>

                <label for="medType">Type:</label>
                <input type="text" id="medType" name="medType" required><br>

                <label for="medPrescription">Prescription (Yes/No):</label>
                <input type="text" id="medPrescription" name="medPrescription" required><br>

                <label for="medMedication">Medication:</label>
                <input type="text" id="medMedication" name="medMedication" required><br>

                <label for="medExpiration">Expiration Date:</label>
                <input type="date" id="medExpiration" name="medExpiration" required><br>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Resources Modal Form -->
    <div id="resourcesModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('resourcesModal')">&times;</span>
            <h2>Add Resources</h2>
            <form id="resourcesForm" action="{{ route('add.resource') }}" method="POST">
                @csrf
                <label for="resName">Name:</label>
                <input type="text" id="resName" name="resName" required><br>

                <label for="resQuantity">Quantity:</label>
                <input type="number" id="resQuantity" name="resQuantity" required><br>

                <label for="resUnit">Unit:</label>
                <input type="text" id="resUnit" name="resUnit" required><br>

                <label for="resPrescription">Prescription (Yes/No):</label>
                <input type="text" id="resPrescription" name="resPrescription" required><br>

                <label for="resExpiration">Expiration Date:</label>
                <input type="date" id="resExpiration" name="resExpiration" required><br>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function showTable(tableId, addButtonId) {
            document.getElementById('medicinesTable').style.display = 'none';
            document.getElementById('resourcesTable').style.display = 'none';
            document.getElementById('addMedicineBtn').style.display = 'none';
            document.getElementById('addResourcesBtn').style.display = 'none';

            document.getElementById(tableId).style.display = 'table';
            document.getElementById(addButtonId).style.display = 'block';
        }

        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }

        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                closeModal(event.target.id);
            }
        }
    </script>
</body>
</html>
