<?php
class adminModel
{


    function getSiteSettings()
    {

        $db = new database();
        $query = "SELECT * from siteayar limit 1";
        $stm = $db->read($query);
        if ($stm) {
            return $stm;
        } else {
            return false;
        }

    }


    function getAbout()
    {

        $db = new database();
        $query = "SELECT * from about limit 1";
        $stm = $db->read($query);
        if ($stm) {
            return $stm;
        } else {
            return false;
        }

    }


    function getPost()
    {

        $db = new database();
        $query = "SELECT * from posts";
        $stm = $db->Allread($query);
        if ($stm) {
            return $stm;
        } else {
            return false;
        }

    }

    function getUser()
    {

        $db = new database();
        $query = "SELECT * from user";
        $stm = $db->Allread($query);
        if ($stm) {
            return $stm;
        } else {
            return false;
        }

    }





}



?>