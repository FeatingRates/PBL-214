<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking_db";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fungsi untuk menambahkan booking baru
function addBooking($user_id, $room_id, $date, $time) {
    global $conn;
    $sql = "INSERT INTO bookings (user_id, room_id, date, time, status) VALUES ('$user_id', '$room_id', '$date', '$time', 'pending')";
    if ($conn->query($sql) === TRUE) {
        echo "Booking berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fungsi untuk mendapatkan daftar booking
function getBookings() {
    global $conn;
    $sql = "SELECT * FROM bookings";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"]. " - User: " . $row["user_id"]. " - Room: " . $row["room_id"]. " - Date: " . $row["date"]. " - Time: " . $row["time"]. " - Status: " . $row["status"]. "<br>";
        }
    } else {
        echo "Tidak ada booking";
    }
}

// Contoh penggunaan fungsi
addBooking(1, 2, '2024-09-25', '10:00');
getBookings();

$conn->close();
?>