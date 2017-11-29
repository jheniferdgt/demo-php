<?php
$current_page = $data['paginator']['current_page_number'];
?>
<h1>Listing </h1>
<table class="table table-striped" id="tableListing">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">MLS</th>
        <th scope="col">PRICE</th>
        <th scope="col" style="width:350px;">ADDRESS SHORT </th>
        <th scope="col" style="width:250px;">ADDRESS LARGE</th>
        <th scope="col">EDIT</th>
        <th scope="col">DELETE</th>
    </tr>
    </thead>
    <?php foreach($data['items'] as $row): ?>
        <tr>
            <?php foreach($row as $r): ?>
                <td><?php echo $r; ?></td>
            <?php endforeach; ?>
            <td><?php echo sprintf('<a href="index.php?action=edit&id=%d">Edit</a>', $row['sysid']); ?></td>
            <td><?php echo sprintf('<a class="btn-delete" data-code="%s" href="index.php?action=delete&id=%d">Delete</a>', $row['sysid'], $row['sysid']); ?></td>

        </tr>
    <?php endforeach; ?>
</table>

<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $current_page-1; ?>">Previous</a></li>
        <?php for($p= $current_page; $p<= ($current_page+3); $p++): ?>
            <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $p; ?>"><?php echo $p; ?></a></li>
        <?php endfor; ?>
        <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $current_page+1; ?>">Next</a></li>
    </ul>
</nav>