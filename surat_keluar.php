<?php
include('header.php');
include('database.php');
$data_surat_keluar = $db_koneksi->query("SELECT * FROM surat WHERE jenis = 'keluar'");

?>

<body class="text-center">
    <div class="card m-2">
        <h5 class="card-header">Surat Keluar</h5>
        <div class="card-body">
            <div class="d-flex justify-content-between mb-3">
                <div>
                    <a href="tambah.php" class="btn btn-primary">Tambah</a>
                </div>
                <div class="w-50">
                    <input class="form-control text-center" id="filter_surat" placeholder="Pencarian">
                </div>
                <div>
                    <button type="button" id="exportButton" class="btn btn-warning">Export PDF</button>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered" id="tabel_surat">
                <tr class="text-center">
                    <th>NO</th>
                    <th>TANGGAL SURAT</th>
                    <th>NOMOR SURAT</th>
                    <th>KEPADA</th>
                    <th>PERIHAL SURAT</th>
                    <th>KETERANGAN</th>
                    <th>AKSI</th>
                </tr>
                <?php
                $index = 0;
                if (mysqli_num_rows($data_surat_keluar) > 0) {
                    while ($row = $data_surat_keluar->fetch_row()) {
                        echo "<tr>";
                        echo "<td class='text-center'><input type='text' name='$row[0]' hidden>" . ($index + 1) . "</td>";
                        echo "<td class='text-center'>" . $row[2] . "</td>";
                        echo "<td>" . $row[4] . "</td>";
                        echo "<td>" . $row[6] . "</td>";
                        echo "<td>" . $row[7] . "</td>";
                        echo "<td>" . $row[8] . "</td>";
                        echo "<td><a class='btn btn-sm btn-outline-primary' href='edit.php?id=$row[0]'>edit</a> <a class='btn btn-sm btn-outline-danger' href='hapus.php?id=$row[0]'>hapus</a></td>";
                        echo "</tr>";
                        $index++;
                    }
                } else {
                    echo "Tidak ada data!";
                }
                ?>
            </table>
        </div>
    </div>

    <script src="scripts/html2canvas.1.0.0-rc.7.js"></script>
    <script src="scripts/dompurify.2.2.0.min.js"></script>
    <script src="scripts/jspdf.2.1.1.umd.min.js"></script>
    <script src="scripts/jspdf.plugin.autotable.js"></script>

    <script>
        const filterinput = document.getElementById('filter_surat');
        filterinput.addEventListener('input', filterTable);

        function filterTable() {
            const filterValue = filterinput.value.toLowerCase();
            const table = document.getElementById('tabel_surat');
            const rows = table.getElementsByTagName('tr');

            let visibleIndex = 1;

            for (let i = 1; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let rowVisible = false;

                for (let j = 0; j < cells.length; j++) {
                    const cellText = cells[j].textContent || cells[j].innerText;
                    if (cellText.toLowerCase().indexOf(filterValue) > -1) {
                        rowVisible = true;
                        break;
                    }
                }

                if (rowVisible) {
                    rows[i].style.display = '';
                    rows[i].cells[0].textContent = visibleIndex.toString();
                    visibleIndex++;
                } else {
                    rows[i].style.display = 'none';
                }

                // rows[i].style.display = rowVisible ? '' : 'none';
            }
        }

        const exportButton = document.getElementById("exportButton");
        exportButton.addEventListener('click', exportToPDF);

        function exportToPDF() {
            var doc = new jspdf.jsPDF('p', 'pt', 'a4');

            doc.autoTable({
                html: '#tabel_surat',
                columns: [{
                        dataKey: 'column1'
                    },
                    {
                        dataKey: 'column2'
                    },
                    {
                        dataKey: 'column3'
                    },
                    {
                        dataKey: 'column4'
                    },
                    {
                        dataKey: 'column5'
                    },
                    {
                        dataKey: 'column6'
                    }
                ],
                margin: {
                    top: 50
                },
                didDrawPage: function(data) {
                    doc.text("SURAT KELUAR", 225, 30);
                },
            })
            doc.save('Surat Keluar.pdf')
        }
    </script>
</body>

<?php
$db_koneksi->close();
?>