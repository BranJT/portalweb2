<?php

use Illuminate\Database\Seeder;
use App\Model\Presentacion;

class PresentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('presentacion')->delete();

        $presentacion = new Presentacion();
        $presentacion->descripcion = 'At La Victoria Lab, we improve the lives of Peruvian families through human-centered innovation.';
        $presentacion->videoFondo = 'video1280-720.mp4';
        $presentacion->save();
    }
}
