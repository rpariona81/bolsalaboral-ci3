<h1 class="mt-4">Docentes</h1>
<div class="card mb-4">
    <div class="card-header">
        <a class="btn btn-success btn-md" data-toggle="tooltip" data-placement="bottom" title="Crear nuevo registro" href="/admin/newdocente">Nuevo docente&nbsp;&nbsp;<i class="fa fa-plus"></i></a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple" name="datatablesSimple" class="display datatable table-striped dt-responsive" style="width:100%">
            <thead>
                <tr>
                    <th>Cod Usuario</th>
                    <th>Nombres y apellidos</th>
                    <th>Documento identidad</th>
                    <th>Celular</th>
                    <th>Sexo</th>
                    <th>Email</th>
                    <th>Condición</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $item) : ?>
                    <tr>
                        <td><?= str_pad($item->id, 5, '0', STR_PAD_LEFT); ?></td>
                        <td><?= $item->name . ' ' . $item->paternal_surname . ' ' . $item->maternal_surname ?></td>
                        <td><?= $item->document_type_label . ' ' . $item->document_number ?></td>
                        <td class="text-center"><?= $item->mobile ?></td>
                        <td><?= $item->gender ?></td>
                        <td class="text-center"><?= $item->email ?></td>
                        <td class="text-center"><?= $item->graduated ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <?php
                                if ($item->status) {
                                    //echo '<a class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Desactivar" href="<?= $item->id ? >"><i class="fa fa-eye-slash"></i></a>';
                                    echo form_open('admincontroller/desactivaDocente');
                                    echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                    echo '<button type="submit" name="submit" class="btn btn-outline-danger btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Desactivar"><i class="fa fa-eye-slash"></i></button>';
                                    echo form_close();
                                } else {
                                    //echo '<a class="btn btn-outline-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Activar" href="<?= $item->id>"><i class="fa fa fa-eye"></i></a>';
                                    echo form_open('admincontroller/activaDocente');
                                    echo '<input type="hidden" id="id" name="id" value="' . $item->id . '">';
                                    echo '<button type="submit" name="submit" class="btn btn-outline-primary btn-sm display-inline" data-toggle="tooltip" data-placement="bottom" title="Activar"><i class="fa fa-eye-slash"></i></button>';
                                    echo form_close();
                                }
                                ?>
                                &nbsp;&nbsp;
                                <a class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Editar" href="/admin/docente/<?= $item->id ?>"><i class="fa fa-edit"></i></a>
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