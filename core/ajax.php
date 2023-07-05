<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8;", "root", "");
} catch (PDOException $th) {
    echo $th;
}



if (isset($_POST)) {


    if (isset($_POST['action']) && $_POST['action'] == "displayUser") {

        $query = "SELECT * From user";
        $stm = $db->prepare($query);
        $stm->execute();
        $rows = $stm->fetchAll(PDO::FETCH_ASSOC);

        $table = '
                <table class="table table-striped">
                <thead>
                    <tr class="warning">
                        <th></th>
                        <th>Ad Soyad</th>
                        <th>E-mail</th>
                        <th>Parola</th>
                        <th>Durum</th>
                        <th>İşlem</th>

                    </tr>
                </thead>
                <tbody> ';
        foreach ($rows as $key) {
            $id = $key['id'];
            $name = $key['name'];
            $email = $key['email'];
            $passwd = $key['passwd'];
            $durum = $key['durum'];
            $table .= '  
                  <tr>
                    <td></td>
                    <td>' . $name . '</td>
                    <td>' . $email . '</td>
                    <td>' . $passwd . '</td>
                    <td>' . $durum . '</td>
                   
           
                
                <td>
                <button  class="btn btn-primary" onclick="userEdit(' . $id . ')" data-target="#users_Edit" data-toggle="modal">Düzenle</button>
                <button onclick="userDelete(' . $id . ')" class="btn btn-danger">Sil</button>
                </td>
                </tr> 
                ';
        }

        $table .= ' </tbody>
            </table> ';
        echo $table;


    }

    if (isset($_POST['action']) && $_POST['action'] == "displayPost") {

        $query="SELECT * from posts";
        $stm=$db->query($query);
        $data=$stm->fetchAll(PDO::FETCH_ASSOC);
  $table='  <table class="table table-striped">
						<thead>
							<tr class="warning">
								<th>Sıra</th>
								<th>Post Başlık</th>
								<th>Post Seo</th>
								<th>Post Açıklama</th>
								<th>Post Resim</th>
								<th>Post oluşturma Tarih</th>
								<th>Post ekleyen</th>
								<th>Post Durum</th>
								<th>işlem</th>

							</tr>
						</thead>
						<tbody> ';
                     
						         foreach ($data as $key) { 
                                    $id=$key['id'];
                                    $postTitle=$key['post_title'];
                                    $postSeo= $key['post_seo_url'];
                                    $postDesc= $key['post_desc'];
                                    $postImg= $key['post_img'];
                                    $postDate=$key['post_create_date'];
                                    $postSendName= $key['post_send_name'];
                                    $postStatus=$key['durum'];
							$table.='	<tr>
								<td>'.$id.'</td></td>
								<td>'.$postTitle.'</td>
								<td>'.$postSeo.'</td>
								<td>'.$postDesc.'</td>
								<td>'.$postImg.'</td>
								<td>'.$postDate.'</td>
								<td>'.$postSendName.'</td>
								<td>'.$postStatus.'</td>

								 <td>
				<button type="" class="btn btn-primary" data-target="#PostUpdate" data-toggle="modal">Düzenle</button>
            	 <button type="" onclick="postDelete('.$id.')" id="delete" class="btn btn-danger">Sil</button>
								</td>

							</tr> ';

							} 
							
					$table.='	</tbody>
					</table> ';
                    echo $table;
    }
    
    if (isset($_POST['action']) && $_POST['action'] == "postDelete") {

        $postID = $_POST['id'];

        $quer = "DELETE from posts WHERE id=?";
        $stm = $db->prepare($quer);
        $stm->execute([$postID]);
        if ($stm) {
            echo 'kayit başarı ile silindi';
        } else {
            echo 'bir sorun oluştu';
        }

    }

    if (isset($_POST['action']) && $_POST['action'] == "userEdit") {


        $kullaniciAdi = $_POST['user-name-edit'];
        $kullaniciMail = $_POST['user-mail-edit'];
        $kullaniciPasswd = md5($_POST['user-passwd-edit']);
        $kullaniciDurum = $_POST['user-status-edit'];
        $id = $_POST['id'];

        if (!empty($kullaniciAdi) && !empty($kullaniciMail) && !empty($kullaniciPasswd)) {

            $data = [$kullaniciAdi, $kullaniciMail, $kullaniciPasswd, $kullaniciDurum, $id];

            $query = "UPDATE user SET name=?,email=?,passwd=?,durum=? WHERE id=?";
            $stm = $db->prepare($query);
            $status = $stm->execute($data);

            if ($status) {
                echo "Başarılı";

            } else {

                echo "Başarısız";
            }

        } else {
            echo "Boş";

        }
    }

    if (isset($_POST['action']) && $_POST['action'] == "useradd") {

        if (!empty($_POST['user_name']) && !empty($_POST['user_mail']) && !empty($_POST['user_passwd'])) {
            $userName = htmlspecialchars($_POST['user_name']);
            $userMail = htmlspecialchars($_POST['user_mail']);
            $userPaswd = md5($_POST['user_passwd']);


            $query = "INSERT INTO user (name,email,passwd) VALUE (?,?,?)";
            $data = $db->prepare($query);
            $data->execute([$userName, $userMail, $userPaswd]);

            if ($data) {
                echo "Başarılı";

            } else {
                echo "Hata";
            }

        } else {
            echo 'required';
        }
    }

    if (isset($_POST['action']) && $_POST['action'] == "userDelete") {

        $Userid = $_POST['id'];

        $quer = "DELETE from user WHERE id=?";
        $stm = $db->prepare($quer);
        $stm->execute([$Userid]);
        if ($stm) {
            echo 'kayit başarı ile silindi';
        } else {
            echo 'bir sorun oluştu';
        }

    }

    if (isset($_POST['action']) && $_POST['action'] == "search") {
        if ($_POST['query'] == '') {

            $quer = "SELECT * from posts WHERE durum=1";
            $a = $db->prepare($quer);
            $a->execute();
            $stm = $a->fetchAll(PDO::FETCH_ASSOC);


        } else {
            $s = htmlspecialchars($_POST['query']);
            $quer = "SELECT * from posts WHERE post_title LIKE '%{$s}%' and durum=1";
            $a = $db->prepare($quer);
            $a->execute();
            $stm = $a->fetchAll(PDO::FETCH_ASSOC);
        }

        $data = '';
        if ($stm) {

            foreach ($stm as $key) {
                $postImg = $key['post_img'];
                $postTitle = $key['post_title'];
                $postUrl = $key['post_seo_url'];
                $postDate = $key['post_create_date'];
                $postDesc = $key['post_desc'];
                $postName = $key['post_send_name'];

                $data .= '
        
        <div class="item mb-5">
        <div class="media">
            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="http://localhost/phpMvc//assets' . $postImg . '" alt="image">
            <div class="media-body">
                <h3 class="title mb-1"><a href="http://localhost/phpMvc/post/' . $postUrl . '.">' . $postTitle . '</a></h3>
                <div class="meta mb-1"><span class="date">' . $postDate . '</span><span class="time">' . $postName . '</span><span class="time">5 min read</span></div>
                <div class="intro">' . $postDesc . '</div>
                <a class="more-link" href="post/' . $postUrl . '">Daha fazlası &rarr;</a>
            </div><!--//media-body-->
        </div><!--//media-->
        </div><!--//item-->
        
        ';


            }
        } else {
            $data = "Arama Sonucu Bulunamadı.";
        }
        echo $data;

    }



}


?>