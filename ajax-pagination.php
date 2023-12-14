<?php
($conn = mysqli_connect("localhost", "root", "password", "demo")) or die("connection failed");

$limitPerPage = 5;
$page = isset($_POST['page_no']) ? $_POST['page_no'] : 1;

$offset = ($page - 1) * $limitPerPage;

$sql = "SELECT * FROM students LIMIT $offset, $limitPerPage";
($result = mysqli_query($conn, $sql)) or die("query unsuccessful");

$output = '';

if (mysqli_num_rows($result) > 0) {
    $output .= '
        <table class="table table-striped" style="border:1px solid black">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">NAME</th>
            </tr>
        </thead>
        <tbody>';

    while ($row = mysqli_fetch_assoc($result)) {
        $output .=
            '<tr>
                        <td>' .
            $row['s_id'] .
            '</td>
                        <td>' .
            $row['s_name'] .
            '</td>
                    </tr>';
    }

    $output .= '</tbody></table>';

    $studentTotal = "SELECT COUNT(*) AS total FROM students";
    ($records = mysqli_query($conn, $studentTotal)) or die("query unsuccessful");
    $totalRecords = mysqli_fetch_assoc($records)['total'];
    $totalPages = ceil($totalRecords / $limitPerPage);

    $output .= '<ul class="pagination pagination-lg" id="pagination">';
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            $activeClass = "active";
        } else {
            $activeClass = "";
        }
        $output .= '<li id="' . $i . '" class="' . $activeClass . '"><a class="page-link" href="#">' . $i . '</a></li>';
    }
    $output .= '</ul>';

    echo $output;
}
?>
