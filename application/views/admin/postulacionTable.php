<h1 class="mt-4">Postulaciones</h1>
<div class="card mb-4">
    <div class="card-header">
        <a class="btn btn-success btn-md" data-toggle="tooltip" data-placement="bottom" href="/admin/postulaciones">Todos&nbsp;&nbsp;<i class="fa fa-table"></i></a>
        <a class="btn btn-primary btn-md" data-toggle="tooltip" data-placement="bottom" href="/admin/postulaciones/1">Arquitectura de Plataformas y Servicios de Tecnologías de la Información&nbsp;&nbsp;<i class="fa fa-table"></i></a>
        <a class="btn btn-danger btn-md" data-toggle="tooltip" data-placement="bottom" href="/admin/postulaciones/2">Enfermería Técnica&nbsp;&nbsp;<i class="fa fa-table"></i></a>
        <a class="btn btn-secondary btn-md" data-toggle="tooltip" data-placement="bottom" href="/admin/postulaciones/3">Farmacia Técnica&nbsp;&nbsp;<i class="fa fa-table"></i></a>
        <a class="btn btn-info btn-md" data-toggle="tooltip" data-placement="bottom" href="/admin/postulaciones/4">Tecnología Pesquera y Acuícola&nbsp;&nbsp;<i class="fa fa-table"></i></a>
        <a class="btn btn-dark btn-md" data-toggle="tooltip" data-placement="bottom" href="/admin/postulaciones/5">Desarrollo pesquero y acuícola&nbsp;&nbsp;<i class="fa fa-table"></i></a>
    </div>
    
    <div class="card-body">
        <table id="datatablesSimple" name="datatablesSimple" class="display datatable table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Cod Postulación</th>
                    <th>Cod Oferta</th>
                    <th>Programa de estudios</th>
                    <th>Convocatoria</th>
                    <th>Tipo</th>
                    <th>F. publicación</th>
                    <th>F. vigencia</th>
                    <th>Postulante</th>
                    <th>Condición</th>
                    <th>F. Postulación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $item) : ?>
                    <tr>
                        <td><?= str_pad($item->id, 7, '0', STR_PAD_LEFT); ?></td>
                        <td><?= str_pad($item->offer_id, 6, '0', STR_PAD_LEFT); ?></td>
                        <td><?= $item->career_title ?></td>
                        <td><?= $item->title ?></td>
                        <td><?= $item->type_offer ?></td>
                        <td><?= $item->date_publish ?></td>
                        <td><?= $item->date_vigency ?></td>
                        <td><?= $item->name . ' ' . $item->paternal_surname . ' ' . $item->maternal_surname ?></td>
                        <td><?= $item->graduated ?></td>
                        <td class="text-center"><?= $item->date_postulation ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Descargar CV" target="_blank" download="<?= $item->filecv; ?>" href="<?= base_url('/uploads/filescv/' . $item->filecv); ?>"><i class="fa fa-file-pdf-o" title="<?= $item->filecv ?>"></i></a>
                                &nbsp;&nbsp;
                                <?php
                                if ($item->status) {
                                    //echo '<a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" href="<?= $item->id ? >"><i class="fa fa-eye-slash"></i></a>';
                                    echo form_open('admincontroller/desactivaPostulacion');
                                    echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                    echo '<input type="hidden" id="career_id" name="career_id" value="' . $item->career_id. '">';
                                    echo '<button type="submit" name="submit" class="btn btn-outline-danger btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Desactivar"><i class="fa fa-eye-slash"></i></button>';
                                    echo form_close();
                                } else {
                                    //echo '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" href="<?= $item->id>"><i class="fa fa fa-eye"></i></a>';
                                    echo form_open('admincontroller/activaPostulacion');
                                    echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                    echo '<input type="hidden" id="career_id" name="career_id" value="' . $item->career_id. '">';
                                    echo '<button type="submit" name="submit" class="btn btn-outline-primary btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Activar"><i class="fa fa-eye-slash"></i></button>';
                                    echo form_close();
                                }
                                ?>
                                &nbsp;&nbsp;
                                <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="/admin/postulacion/<?= $item->id ?>"><i class="fa fa-edit"></i></a>
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