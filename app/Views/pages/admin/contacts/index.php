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

    <div class="card shadow">
        <div class="table-responsive small card-body">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Received at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($contacts) && is_array($contacts)): ?>
                        <?php foreach ($contacts as $index => $contact): ?>
                            <tr>
                                <td class="align-middle px-2"><?= $index + 1; ?></td>
                                <td class="align-middle"><?= esc($contact['name']); ?></td>
                                <td class="align-middle"><?= esc($contact['email']); ?></td>
                                <td class="align-middle"><?= esc($contact['subject']); ?></td>
                                <td class="align-middle"><?= esc($contact['created_at']); ?></td>
                                <td class="align-middle">                                    
                                    <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#showModal<?= $contact['id']; ?>">Show</button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $contact['id']; ?>">Delete</button>
                                    
                                    <div class="modal fade" id="showModal<?= $contact['id']; ?>" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="showModalLabel">Contact Details</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <strong>Name:</strong> <?= esc($contact['name']); ?><br>
                                                    <strong>Email:</strong> <?= esc($contact['email']); ?><br>
                                                    <strong>Subject:</strong> <?= esc($contact['subject']); ?><br>
                                                    <strong>Message:</strong><br>
                                                    <pre><?= esc($contact['message']); ?></pre>
                                                    <strong>Received At:</strong> <?= esc($contact['created_at']); ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="deleteModal<?= $contact['id']; ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to delete this contact?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <a href="<?= base_url('admin/contact/delete/' . $contact['id']); ?>" class="btn btn-danger">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center">No data available</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>  
    </div>
<?= $this->endSection(); ?>
