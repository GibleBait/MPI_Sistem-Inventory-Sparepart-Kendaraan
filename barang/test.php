<?php
if (function_exists('mysqli_connect')) {
    echo "✅ MySQLi aktif, siap tempur!";
} else {
    echo "❌ MySQLi belum aktif.";
}
?>