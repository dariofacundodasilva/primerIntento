<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');


		//insertamos los usuarios
        $this->call('RangoTableSeeder');
        //mostramos el mensaje de que los usuarios se han insertado correctamente
        $this->command->info('Rango table seeded!');
	}

	class RangoTableSeeder extends Seeder {
 
	    public function run()
	    {
	 
	        DB::table('rangos')->insert(array(
	                'descripcion' => 'suscriptor'
	                
	        ));
	        DB::table('rangos')->insert(array(
	                'descripcion' => 'editor'
	                
	        ));
	        DB::table('rangos')->insert(array(
	                'descripcion' => 'administrador'
	                
	        ));
	 
	    }
	}

}
//	php artisan db:seed