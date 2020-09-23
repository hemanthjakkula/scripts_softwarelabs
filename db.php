<?php


$connect = mysqli_connect("localhost", "root", "6325", "employees_dictionary");

if ($connect->connect_error) {
	die("Connection Failed: " . $connect->connect_error);
}
