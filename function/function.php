<?php

$conn = mysqli_connect("localhost", "root", "", "dbpln");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

function regist($data){
    global $conn;

    $username = $data['username'];
    $email = $data['email'];
    $pass = $data['pass'];

    mysqli_query($conn,"INSERT INTO `user` (`username`, `email`, `pass`) VALUES ('$username', '$email', '$pass')");

    return mysqli_affected_rows($conn);

}

function login($username, $pass) {
    global $conn;
    
    $username = $conn->real_escape_string($username);
    $pass = $conn->real_escape_string($pass);

    $query = "SELECT * FROM user WHERE username='$username' AND pass='$pass'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        return $user;
    } else {
        return null;
    }

    $conn->close();
    main();
}

function insert($data){
    global $conn;

    $nopel = $data['nopel'];
    $nama = $data['nama'];
    $email = $data['email'];
    $notelp = $data['notelp'];
    $stats = 'DIPROSES';
    $kategori = $data['kategori'];
    $alamat = $data['alamat'];

    $result = mysqli_query($conn, "INSERT INTO `pengaduan` (`nopel`, `nama`, `email`, `notelp`, `stats`, `kategori`, `alamat`) VALUES ('$nopel', '$nama', '$email', '$notelp', '$stats', '$kategori', '$alamat')");

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    return mysqli_affected_rows($conn);

}

function deletePengaduan($id) {
    global $conn;

    $query = "DELETE FROM pengaduan WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);

    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Pengaduan berhasil dihapus!'
        ];
    } else {
        $response = [
            'success' => false,
            'message' => 'Gagal menghapus pengaduan!'
        ];
    }

    $stmt->close();

    return $response;
}

function edit($data, $id){
    global $conn;

    $stats = $data['stats'];

    mysqli_query($conn, "UPDATE `pengaduan` SET `stats` = '$stats' WHERE `pengaduan`.`id` = '$id'");

    return mysqli_affected_rows($conn);
}

function fetchFormData($id) {
    global $conn;

    $id = mysqli_real_escape_string($conn, $id);

    $result = mysqli_query($conn, "SELECT * FROM pengaduan WHERE id = '$id'");
    $data = mysqli_fetch_assoc($result);

    // Mengembalikan data sebagai objek JSON
    echo json_encode(['data' => $data]);
    exit();
}
