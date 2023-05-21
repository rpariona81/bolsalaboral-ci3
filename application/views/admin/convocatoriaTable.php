<h1 class="mt-4">Convocatorias</h1>
<div class="card mb-4">
    <div class="card-header">
        
        <a class="btn btn-success btn-md" data-toggle="tooltip" data-placement="bottom" title="Crear nuevo registro" href="/admin/newconvocatoria">Nueva convocatoria&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" name="datatablesSimple" class="display datatable table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Cod Oferta</th>
                    <th>Programa de estudios</th>
                    <th>Convocatoria</th>
                    <th>Tipo</th>
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
                        <td><?= str_pad($item->id, 6, '0', STR_PAD_LEFT); ?></td>
                        <td><?= $item->career_title ?></td>
                        <td><?= $item->title ?></td>
                        <td><?= $item->type_offer ?></td>
                        <td class="text-center"><?= $item->vacancy_numbers ?></td>
                        <!--<td>< ?= date_format($item->date_publish, 'd/m/Y') ?></td>-->
                        <!--<td>< ?= date_format($item->date_vigency, 'd/m/Y') ?></td>-->
                        <td><?= $item->date_publish ?></td>
                        <td><?= $item->date_vigency ?></td>
                        <td class="text-center"><?= $item->cant_postulantes ?></td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?php
                            if ($item->status) {
                                //echo '<a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" href="<?= $item->id ? >"><i class="fa fa-eye-slash"></i></a>';
                                echo form_open('admincontroller/desactivaConvocatoria');
                                echo '<input type="hidden" id="id" name="id" value="'.$item->id.'">';
                                echo '<button type="submit" name="submit" class="btn btn-outline-danger btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Desactivar"><i class="fa fa-eye-slash"></i></button>';
                                echo form_close();
                            } else {
                                //echo '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" href="<?= $item->id>"><i class="fa fa fa-eye"></i></a>';
                                echo form_open('admincontroller/activaConvocatoria');
                                echo '<input type="hidden" id="id" name="id" value="'.$item->id.'">';
                                echo '<button type="submit" name="submit" class="btn btn-outline-primary btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Activar"><i class="fa fa-eye-slash"></i></button>';
                                echo form_close();
                            }
                            ?>
                            &nbsp;&nbsp;
                            <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="/admin/convocatoria/<?= $item->id ?>"><i class="fa fa-edit"></i></a>
                        </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
        $(document).ready(function() {
            //$.noConflict();
            $('#datatablesSimple').DataTable({
                pageLength: 7,
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