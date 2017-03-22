<?php
    require_once('./vendor/autoload.php');//loads composer

    /* Composer will create several files: composer.json, composer.lock, 
       and a vendor directory that will contain the library and any other dependencies
       your project might require.*/

    class Student{   //---- Database storage Class, must be same as file name -------
        function __construct()
        {
             $this->db = (new MongoDB\Client)->studentResult->studentDetails;  //db_name->collection_name

        }

        public function insertNewItem( $itemInfo = [] )
        {
            if( empty( $itemInfo ) ){ 
                return false;
            }
            //-------- We have some data to insert (Insert Successful) ----------
           $insertable = $this->db->insertOne([
                'name' => $itemInfo['name'],
                'admissionNo' => $itemInfo['admissionNo'],
                'branch' => $itemInfo['branch'],
                'semester' => $itemInfo['semester'],
                'maths' => $itemInfo['maths'],
                'co' => $itemInfo['maths'],
                'algo' => $itemInfo['algo'],
                'toc' => $itemInfo['toc'],
                'eng' => $itemInfo['eng']
            ]);
            //return this inserted documents mongodb id.
            return $insertable->getInsertedId();
        }

        public function fetchData()
        {
            return $this->db->find();
        }

        public function updateData($adm ,$sub, $val)
        {
            $updateResult = $this->db->updateOne(
                     ['admissionNo' => $adm],
                     ['$set' => [$sub => $val]]
        );
        }
    }

    //-------------------------For Professor's details---------------------------------------
    class Professor{  
        function __construct()
        {
             $this->db = (new MongoDB\Client)->studentResult->teacherDetails;  //db_name->collection_name

        }

        public function insertNewItem( $itemInfo = [] )
        {
            if( empty( $itemInfo ) ){ 
                return false;
            }
            //-------- We have some data to insert (Insert Successful) ----------
           $insertable = $this->db->insertOne([
                'pname' => $itemInfo['pname'],
                'id' => $itemInfo['id']
            ]);
            //return this inserted documents mongodb id.
            return $insertable->getInsertedId();
        }

        public function fetchData()
        {
            return $this->db->find();
        }
    }