<h1 class="mt-4">Convocatorias</h1>
<div class="card mb-4">
    <div class="card-header">
        
        <a class="btn btn-success btn-md" data-toggle="tooltip" data-placement="bottom" title="Crear nuevo registro" href="/admin/newconvocatoria">Nueva convocatoria&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" name="datatablesSimple" class="table table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Convocatoria</th>
                    <th>Tipo</th>
                    <th>Detalle</th>
                    <th># vacantes</th>
                    <th>F. publicación</th>
                    <th>F. vigencia</th>
                    <th># postulantes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $item) : ?>
                    <tr>
                        <td><?= $item->title ?></td>
                        <td><?= $item->type_offer ?></td>
                        <td><?= substr($item->detail, 0, 90) . '...' ?></td>
                        <td class="text-center"><?= $item->vacancy_numbers ?></td>
                        <td><?= date_format($item->date_publish, 'd/m/Y') ?></td>
                        <td><?= date_format($item->date_vigency, 'd/m/Y') ?></td>
                        <td><?= $item->date_vigency ?></td>
                        <td>
                            <?php
                            if ($item->status) {
                                echo '<a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" href="<?= $item->id ?>"><i class="fa fa-eye-slash"></i></a>';
                            } else {
                                echo '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" href="<?= $item->id ?>"><i class="fa fa fa-eye"></i></a>';
                            }
                            ?>
                            &nbsp;&nbsp;
                            <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="/admin/convocatoria/<?= $item->id ?>"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!--<script src="< ?= base_url('assets/js/datatables-simple-demo.js') ?>"></script>-->

<!--<script>
    $(document).ready(function() {
        //$.noConflict();
        $('#datatablesSimple').DataTable({
            responsive: true,
            scrollX: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json',
            },
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    customize: function(xlsx) {
                        var sheet = xlsx.xl.worksheets['sheet1.xml'];
                        $('row c[r^="C"]', sheet).attr('s', '2');
                    }
                }
            ]
        });
    });
</script>-->