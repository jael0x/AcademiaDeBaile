<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTable([
            'users',
            'periodos',
            'colors',
            'cursos',
            'docentes',
            'titulos',
            'asignaturas',
            'horarios',
            'tipos',
            'teatros',
            'noti_evens',
        ]);
        $this->call(UserSeeder::class);
        $this->call(PeriodoSeeder::class);
        $this->call(ColorSeeder::class);
        $this->call(CursoSeeder::class);
        $this->call(DocenteSeeder::class);
        $this->call(TituloSeeder::class);
        $this->call(AsignaturaSeeder::class);
        $this->call(HorarioSeeder::class);
        $this->call(TipoSeeder::class);
        $this->call(TeatroSeeder::class);
        $this->call(NotiEvenSeeder::class);
    }

    protected function truncateTable(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); //Desabilita chequeo de clave foranea
        
        foreach ($tables as $table) {
            DB::table($table)->truncate(); //Borra todos los datos de la tabla
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); //Habilita chequeo de clave foranea
    }
}
