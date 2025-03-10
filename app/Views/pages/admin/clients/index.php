<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= esc(session()->getFlashdata('success')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= esc(session()->getFlashdata('error')) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="<?= base_url('/admin/clients/create'); ?>" class="btn btn-primary d-flex align-items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="2" stroke-linecap="butt" stroke-linejoin="bevel"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
            <path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/>
                <circle cx="12" cy="10" r="3"/>
                <circle cx="12" cy="12" r="10"/>
            </svg>
            Add Client
        </a>
    </div>

    <div class="card shadow">
        <div class="table-responsive small card-body">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image Logo</th>
                        <th scope="col">Affiliated Link</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($clients) && is_array($clients)): ?>
                        <?php foreach ($clients as $client): ?>
                            <tr>
                                <td class="align-middle px-2"><?= esc($client['id']); ?></td>
                                <td class="align-middle"><?= esc($client['name']); ?></td>
                                <td class="align-middle">
                                    <img src="<?= base_url('uploads/clients/' . esc($client['image'])); ?>" alt="Client Logo" style="height: 85px;">
                                </td>
                                <td class="align-middle"><?= esc($client['link']); ?></td>
                                <td class="align-middle">
                                    <a href="<?= base_url('admin/clients/edit/' . $client['id']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                    
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $client['id']; ?>">Delete</button>

                                    <div class="modal fade" id="deleteModal<?= $client['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete the client <strong><?= esc($client['name']); ?></strong>?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?= base_url('admin/clients/delete/' . $client['id']); ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No data available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>  
    </div>

<?= $this->endSection(); ?>
