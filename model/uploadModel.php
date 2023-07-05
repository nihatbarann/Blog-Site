
<?php

class uploadModel
{
  

    public function uploadFile($file)
    {

        $maxFileSize=(1024*1024);
        $dirpath = "assets/uploads/";
        $fileName=$file['name'];
        $fileSize=$file['size'];
        $fileType=$file['type'];
        $fileTemp=$file['tmp_name'];

        $targetFile = $dirpath .$fileName;

    
        // Dosya boyutu kontrolü
        if ($fileSize>$maxFileSize) {
            $_SESSION['Error']= "Dosya boyutu çok büyük. Maksimum boyut: " . $maxFileSize . " byte. Tekrar Resim Yükleyiniz";
            return false;
        }

        // İzin verilen dosya türleri kontrolü
        $allowedFileTypes = array("image/jpg", "image/jpeg", "image/png");
        if (!in_array($fileType, $allowedFileTypes)) {
            $_SESSION['Error']="Sadece JPG, JPEG, PNG ve GIF dosya türlerine izin verilir.Tekrar Resim Ekleyiniz";
            return false;
        }

        if (move_uploaded_file($fileTemp, $targetFile)) {
            $_SESSION['Error']="Dosya başarıyla yüklendi";
            return $fileName;
        } else {
            $_SESSION['Error']="Dosya yükleme hatası.";
            return false;
        }
      
}
}

?>  