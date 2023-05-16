<h1 class="mt-5 mb-5">Convocatorias vigentes</h1>

<div class="row align-items-md-stretch">
    <?php foreach ($query as $item) : ?>
        
        <div class="col-md-6 mb-4">
            <div class="h-100 bg-light border border-1 border-radius-pill p-5 text-bg-dark rounded-3">
                <h2><?= $item->title ?></h2>
                <p><?= substr($item->detail, 0, 100) . '...' ?></p>
                <p><small class="text-muted">Fecha de publicación:&nbsp;<?= date("d/m/Y", strtotime($item->date_publish)); ?></small></p>
                <div class="float-end">
                    <a class="btn btn-outline-success" href="#"><strong>Ver más detalles</strong></a>
                </div>
            </div>
        </div>

    <?php endforeach; ?>
</div>