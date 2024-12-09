<?php

if (!defined('_CODE')) {
  die('Access denied...');
}

function query($sql, $data = [], $check = false)
{
  global $conn;
  $ketqua = false;
  try {
    $statement = $conn->prepare($sql);
    if (!empty($data)) {
      $ketqua = $statement->execute($data);
    } else {
      $ketqua = $statement->execute();

    }
  } catch (Exception $e) {
    echo $e->getMessage() . '<br>';
    echo 'File: ' . $e->getCode() . '<br>';
    echo 'Line: ' . $e->getLine();
    die();
  }

  if ($check === true) {
    return $statement;
  }
  return $ketqua;
}
// Hàm insert vào db
function insert($table, $data)
{
  $key = array_keys($data);
  $truong = implode(',', $key);
  $valuetb = ':' . implode(',:', $key);

  $sql = 'INSERT INTO ' . $table . ' (' . $truong . ') VALUES (' . $valuetb . ')';
  // INSERT INTO users (username,email,password) VALUES (:username,:email,:password)

  $kq = query($sql, $data);

  return $kq;
}

function update($table, $data, $condition = '')
{
  $update = '';
  foreach ($data as $key => $value) {
    $update .= $key . '= :' . $key . ',';
  }
  $update = trim($update, ',');

  if (!empty($condition)) {
    $sql = 'UPDATE ' . $table . ' SET ' . $update . ' WHERE ' . $condition;
  } else {
    $sql = 'UPDATE ' . $table . ' SET ' . $update;
  }
// UPDATE users SET email = :email, age = :age WHERE id = 1

  $kq = query($sql, $data);

  return $kq;
}


function delete($table, $condition = '')
{
    if (!empty($condition)) {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $condition; 
    } else {
        $sql = 'DELETE FROM ' . $table; 
    }
    
// DELETE FROM users WHERE id = 1;
    $kq = query($sql);
    return $kq;
}


// lay nhieu dong du lieu
function getRaw($sql)
{
  $kq = query($sql, '', true);
  if (is_object($kq)) {
    $dataFetch = $kq->fetchAll(PDO::FETCH_ASSOC);
  }
  return $dataFetch;
}

// Lay 1 dong du lieu

function oneRaw($sql)
{
  $kq = query($sql, '', true);
  if (is_object($kq)) {
    $dataFetch = $kq->fetch(PDO::FETCH_ASSOC);
  }
  return $dataFetch;
}

// Dem so dong du lieu
function getRows($sql)
{
  $kq = query($sql, '', true);
  if (!empty($kq)) {
    return $kq->rowCount();
  }

}