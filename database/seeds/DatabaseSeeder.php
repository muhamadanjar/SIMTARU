<?php
use App\User;
use App\RoleUser;
use App\Layer;
use App\Role;
use App\Bookmark;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {
	public function run(){
        Eloquent::unguard();
        //DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		$this->call('UserTableSeeder');
	    $this->call('LayerTableSeeder');
        $this->call('UserLevelTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('RoleLayerTableSeeder');
        $this->call('BookmarkTableSeeder');
        
        //DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}

class UserTableSeeder extends Seeder {

    public function run(){
       
        DB::table('Users')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        $user =  array(
            array('name' => 'Muhamad Anjar', 
                'username' => 'admin',
                'email'=> 'arvanria@gmail.com',
                'password' => Hash::make('xcWI3128') ,
                'leveluser' => '1'
            ),
            array(
                'name'     => 'Operator',
                'username' => 'operator',
                'email'    => 'operator@gmail.com',
                'password' => Hash::make('operator'),
                'leveluser' => '2',
            )
            
        );

        foreach($user as $u){
            User::create($u);
        }

    }

}

class UserLevelTableSeeder extends Seeder {

    public function run()
    {
        DB::table('roles')->delete();
        
        Role::create(array(
            'id' => 0,
            'name'     => 'guest',
        ));
        Role::create(array(
            'id' => 1,
            'name'     => 'admin',
        ));
        Role::create(array(
            'id' => 2,
            'name'     => 'bupati',
        ));
        Role::create(array(
            'id' => 3,
            'name'     => 'sekertarisdaerah',
        ));
        Role::create(array(
            'id' => 4,
            'name'     => 'kepaladinastataruang',
        ));
        Role::create(array(
            'id' => 5,
            'name'     => 'sekertarisdinastataruang',
        ));
        Role::create(array(
            'id' => 6,
            'name'     => 'kasiedinastata',
        ));
        Role::create(array(
            'id' => 7,
            'name'     => 'kabid',
        ));
        Role::create(array(
            'id' => 8,
            'name'     => 'skpd',
        ));
        Role::create(array(
            'id' => 9,
            'name'     => 'adplan',
        ));
        Role::create(array(
            'id' => 10,
            'name'     => 'kiosk',
        ));
        
        

    }

}

class LayerTableSeeder extends Seeder {

    public function run()
    {
        DB::table('Layers')->delete();
        $layers = array(
            array(
                'layername'     => 'Administrasi Kabupaten Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_ADMINISTRASI_KABUPATEN_BOGOR/MapServer',
                'layer'    => 'PETA_ADMINISTRASI_KABUPATEN_BOGOR',
                'leveluser' => '1',
                'na' => 'N',       
                'id_grouplayer' => '0',
                'orderlayer' => 0,
                'tipelayer' => 'dynamic',
                'option_opacity' => 0.7,
                'option_visible' => true,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
               
            ),
            array(
                'layername'     => 'Tutupan Lahan',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_TUTUPAN_LAHAN_KABUPATEN_BOGOR/MapServer',
                'layer'    => 'PETA_TUTUPAN_LAHAN_KABUPATEN_BOGOR',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 1,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
            
            ),
            array(
                'layername'     => 'Kemiringan Lahan',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_KEMIRINGAN_LERENG_KABUPATEN_BOGOR/MapServer',
                'layer'    => 'PETA_KEMIRINGAN_LERENG_KABUPATEN_BOGOR',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 2,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
           
            ),
            array(
                'layername'     => 'Geologi',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_GEOLOGI_KABUPATEN_BOGOR/MapServer',
                'layer'    => 'PETA_GEOLOGI_KABUPATEN_BOGOR',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 3,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
      
            ),
            array(
                'layername'     => 'Jenis Tanah',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_JENIS_TANAH_KABUPATEN_BOGOR/MapServer',
                'layer'    => 'PETA_JENIS_TANAH_KABUPATEN_BOGOR',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 4,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
          
            ),
            array(
                'layername'     => 'Rencana Pola Ruang RDTR SEKABUPATEN',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_RENCANA_POLA_RUANG_RDTR_SEKABUPATEN_BOGOR/MapServer',
                'layer'    => 'PETA_RENCANA_POLA_RUANG_RDTR_SEKABUPATEN_BOGOR',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 5,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
                
            ),
            array(
                'layername'     => 'Rencana Pola Ruang KABUPATEN Bogor',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_RENCANA_POLA_RUANG_KABUPATEN_BOGOR/MapServer',
                'layer'    => 'PETA_RENCANA_POLA_RUANG_KABUPATEN_BOGOR',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 6,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
                
            ),
            array(
                'layername'     => 'Rencana Pola Ruang JABODETABEKPUNCUR',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_RENCANA_POLA_RUANG_JABODETABEKPUNCUR/MapServer',
                'layer'    => 'PETA_RENCANA_POLA_RUANG_JABODETABEKPUNCUR',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 7,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
                
            ),
            array(
                'layername'     => 'Rencana Pola Ruang PROVINSI JABAR',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_RENCANA_POLA_RUANG_PROVINSI_JAWA_BARAT/MapServer',
                'layer'    => 'PETA_RENCANA_POLA_RUANG_PROVINSI_JAWA_BARAT',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 8,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
                
            ),
            array(
                'layername'     => 'Geotagging',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/geotagging/MapServer',
                'layer'    => 'geotagging',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 9,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => true,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'viewer',
                
            ),
            array(
                'layername'     => 'Geotagging',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/geotagging_edit/FeatureServer/0',
                'layer'    => 'geotagging_edit',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 10,
                'tipelayer' => 'feature',
                'option_opacity' => 1.0,
                'option_visible' => true,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'editor',
               
            ),
            array(
                'layername'     => 'Sebaran Fasilitas',
                'layerurl' => 'http://silver-pc/arcgis/rest/services/SIMTARU/PETA_SEBARAN_FASILITAS/MapServer',
                'layer'    => 'PETA_SEBARAN_FASILITAS',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 11,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => true,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'editor',
               
            ),
            array(
                'layername'     => 'Sebaran Bangunan',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_SEBARAN_BANGUNAN/MapServer',
                'layer'    => 'PETA_SEBARAN_BANGUNAN',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 12,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'editor',
                
            ),
            array(
                'layername'     => 'Penggunaan Lahan Kota Ciawi',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_PENGGUNAAN_LAHAN_KOTA_CIAWI/MapServer',
                'layer'    => 'PETA_PENGGUNAAN_LAHAN_KOTA_CIAWI',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 13,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'editor',
                
            ),
            array(
                'layername'     => 'Site Plan',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_SITE_PLAN/MapServer',
                'layer'    => 'PETA_SITE_PLAN',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 14,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'editor',
                'jsonfield' => ' ',
            ),
            array(
                'layername'     => 'Ijin Lokasi Bogor 2014',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/PETA_ILOK_KABUPATEN_BOGOR_2014/MapServer',
                'layer'    => 'PETA_ILOK_KABUPATEN_BOGOR_2014',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 15,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => false,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'editor',
                
            ),
            array(
                'layername'     => 'Jalan',
                'layerurl' => 'http://silver-pc:6080/arcgis/rest/services/SIMTARU/ROUTE/MapServer',
                'layer'    => 'jalan',
                'leveluser' => '1',
                'na' => 'N',
                'id_grouplayer' => '0',
                'orderlayer' => 16,
                'tipelayer' => 'dynamic',
                'option_opacity' => 1.0,
                'option_visible' => true,
                'option_mode' => 1,
                'featureaccess' => '', 
                'visible' => 'editor',
                
            ),

            
        );

        foreach($layers as $pri){
            layer::create($pri);
        }
         
    }

}


class RoleUserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role_user')->delete();
        $roleuser = array(
            array(
                'role_id' => 1,
                'user_id' => 1
            )
        );
        foreach ($roleuser as $key) {
            RoleUser::create($key);
        }


    }

}

class RoleLayerTableSeeder extends Seeder {

    public function run()
    {
        DB::table('role_layer')->delete();
        $rolelayer =  array(
            array('role_id' => 0, 'layer_id' => 1),
            array('role_id' => 0, 'layer_id' => 2),

            array('role_id' => 1, 'layer_id' => 1),
            array('role_id' => 1, 'layer_id' => 2),
            array('role_id' => 1, 'layer_id' => 3),
            array('role_id' => 1, 'layer_id' => 4),
            array('role_id' => 1, 'layer_id' => 5),
            array('role_id' => 1, 'layer_id' => 6),
            array('role_id' => 1, 'layer_id' => 7),
            array('role_id' => 1, 'layer_id' => 8),            
            array('role_id' => 1, 'layer_id' => 9),
            array('role_id' => 1, 'layer_id' => 11),
            array('role_id' => 1, 'layer_id' => 12),
            array('role_id' => 1, 'layer_id' => 13),
            array('role_id' => 1, 'layer_id' => 14),
            array('role_id' => 1, 'layer_id' => 15),
            array('role_id' => 1, 'layer_id' => 16),
            //bupati
            array('role_id' => 2, 'layer_id' => 1),
            array('role_id' => 2, 'layer_id' => 2),
            array('role_id' => 2, 'layer_id' => 7),
            array('role_id' => 2, 'layer_id' => 12),
            array('role_id' => 2, 'layer_id' => 13),
            array('role_id' => 2, 'layer_id' => 14),
            //Sekretaris Daerah
            array('role_id' => 3, 'layer_id' => 1),
            array('role_id' => 3, 'layer_id' => 2),
            array('role_id' => 3, 'layer_id' => 7),
            array('role_id' => 3, 'layer_id' => 12),
            array('role_id' => 3, 'layer_id' => 13),
            array('role_id' => 3, 'layer_id' => 14),
            //Kepala Dinas Tata Ruang
            array('role_id' => 4, 'layer_id' => 1),
            array('role_id' => 4, 'layer_id' => 2),
            array('role_id' => 4, 'layer_id' => 3),
            array('role_id' => 4, 'layer_id' => 4),
            array('role_id' => 4, 'layer_id' => 5),
            array('role_id' => 4, 'layer_id' => 6),
            array('role_id' => 4, 'layer_id' => 7),
            array('role_id' => 4, 'layer_id' => 8),            
            array('role_id' => 4, 'layer_id' => 9),
            array('role_id' => 4, 'layer_id' => 10),
            array('role_id' => 4, 'layer_id' => 12),
            array('role_id' => 4, 'layer_id' => 13),
            array('role_id' => 4, 'layer_id' => 14),
            array('role_id' => 4, 'layer_id' => 15),
            array('role_id' => 4, 'layer_id' => 16),
            //Sekretaris Dinas Tata Ruang
            array('role_id' => 5, 'layer_id' => 1),
            array('role_id' => 5, 'layer_id' => 2),
            array('role_id' => 5, 'layer_id' => 3),
            array('role_id' => 5, 'layer_id' => 4),
            array('role_id' => 5, 'layer_id' => 5),
            array('role_id' => 5, 'layer_id' => 6),
            array('role_id' => 5, 'layer_id' => 7),
            array('role_id' => 5, 'layer_id' => 8),            
            array('role_id' => 5, 'layer_id' => 9),
            array('role_id' => 5, 'layer_id' => 10),
            array('role_id' => 5, 'layer_id' => 12),
            array('role_id' => 5, 'layer_id' => 13),
            array('role_id' => 5, 'layer_id' => 14),
            array('role_id' => 5, 'layer_id' => 15),
            array('role_id' => 5, 'layer_id' => 16),
            //Ka. Sie Dinas Tata Ruang
            array('role_id' => 6, 'layer_id' => 1),
            array('role_id' => 6, 'layer_id' => 2),
            array('role_id' => 6, 'layer_id' => 3),
            array('role_id' => 6, 'layer_id' => 4),
            array('role_id' => 6, 'layer_id' => 5),
            array('role_id' => 6, 'layer_id' => 6),
            array('role_id' => 6, 'layer_id' => 7),
            array('role_id' => 6, 'layer_id' => 8),            
            array('role_id' => 6, 'layer_id' => 9),
            array('role_id' => 6, 'layer_id' => 10),
            array('role_id' => 6, 'layer_id' => 12),
            array('role_id' => 6, 'layer_id' => 13),
            array('role_id' => 6, 'layer_id' => 14),
            array('role_id' => 6, 'layer_id' => 15),
            array('role_id' => 6, 'layer_id' => 16),
            //Ka. Bidang Tata Ruang
            array('role_id' => 7, 'layer_id' => 1),
            array('role_id' => 7, 'layer_id' => 2),
            array('role_id' => 7, 'layer_id' => 3),
            array('role_id' => 7, 'layer_id' => 4),
            array('role_id' => 7, 'layer_id' => 5),
            array('role_id' => 7, 'layer_id' => 6),
            array('role_id' => 7, 'layer_id' => 7),
            array('role_id' => 7, 'layer_id' => 8),            
            array('role_id' => 7, 'layer_id' => 9),
            array('role_id' => 7, 'layer_id' => 10),
            array('role_id' => 7, 'layer_id' => 12),
            array('role_id' => 7, 'layer_id' => 13),
            array('role_id' => 7, 'layer_id' => 14),
            array('role_id' => 7, 'layer_id' => 15),
            array('role_id' => 7, 'layer_id' => 16),
            //SKPD Kabupaten Bogor
            array('role_id' => 8, 'layer_id' => 1),
            array('role_id' => 8, 'layer_id' => 2),
            array('role_id' => 8, 'layer_id' => 7),
            array('role_id' => 8, 'layer_id' => 12),
            array('role_id' => 8, 'layer_id' => 13),
            array('role_id' => 8, 'layer_id' => 14),
            //Tim Advice Planning
            array('role_id' => 9, 'layer_id' => 1),
            array('role_id' => 9, 'layer_id' => 2),
            array('role_id' => 9, 'layer_id' => 7),
            array('role_id' => 9, 'layer_id' => 12),
            array('role_id' => 9, 'layer_id' => 13),
            array('role_id' => 9, 'layer_id' => 14),
            array('role_id' => 9, 'layer_id' => 15),
            array('role_id' => 9, 'layer_id' => 16),
            //Pengguna KIOS-K
            array('role_id' => 10, 'layer_id' => 1),
            array('role_id' => 10, 'layer_id' => 2),
            array('role_id' => 10, 'layer_id' => 7),
            array('role_id' => 10, 'layer_id' => 12),
            array('role_id' => 10, 'layer_id' => 13),
            array('role_id' => 10, 'layer_id' => 14)


        );
        foreach($rolelayer as $rl){
            DB::table('role_layer')->insert($rl);
        }


    }

}

class BookmarkTableSeeder extends Seeder {

    public function run()
    {
       
        DB::table('Bookmark')->delete();

        //DB::statement("TRUNCATE TABLE role_user");
        //DB::statement("TRUNCATE TABLE Users");
        
        Bookmark::create(array(
            'name'     => 'Bogor',
            'x_min' => 106.604388339,
            'y_min'    => -6.71663787,
            'x_max' => 107.003690281,
            'y_max' => -6.438022028,
            'wkid' => 4326
        ));

    }

}






