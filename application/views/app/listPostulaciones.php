<h1 class="mt-4">Postulaciones realizadas</h1>
<div class="card mb-4">
    <div class="card-header">
        <i class="fa fa-table me-1"></i>
        Detalle
    </div>
    <div class="card-body">
        <table id="datatablesSimple" class="table table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Convocatoria</th>
                    <th>Tipo</th>
                    <th>F. publicación</th>
                    <th>F. vigencia</th>
                    <th>F. postulación</th>
                    <th>Archivo CV</th>
                    <th>Resultado</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $item) : ?>
                    <tr>
                        <td><?= $item->title ?></td>
                        <td><?= $item->type_offer ?></td>
                        <td><?= $item->date_publish ?></td>
                        <td><?= $item->date_vigency ?></td>
                        <td><?= $item->date_postulation ?></td>
                        <td class="text-center">
                        <?php
                            if ($item->filecv == NULL) {

                            }else{
                                echo '<a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Descargar CV" target="_blank" download="'.$item->filecv.'" href="'.base_url('/uploads/filescv/' . $item->filecv).'"><i class="fa fa-file-pdf-o" title="'. $item->filecv .'"></i></a></td>';
                            }
                        ?>
                        <td><?= $item->result ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!--<script src="< ?= base_url('assets/js/datatables-simple-demo.js') ?>"></script>-->

<script>
    $(document).ready(function() {
        //$.noConflict();
        $('#datatablesSimple').DataTable({
            pageLength: 4,
            responsive: true,
            scrollX: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
            dom: 'Bfrtip',
            buttons: [{
                extend: 'excelHtml5',
                customize: function(xlsx) {
                    var sheet = xlsx.xl.worksheets['sheet1.xml'];
                    $('row c[r^="C"]', sheet).attr('s', '2');
                }
            }]
        });
    });
</script>