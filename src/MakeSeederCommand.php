<?php 

namespace Bhuvidya\Countries;

use Illuminate\Console\Command;

class MakeSeederCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'countries:seeder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a database seeder following the laravel-countries specifications.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function fire()
    {

        $this->line('');
        $this->info('The migration process will create a migration file and a seeder for the countries list');
        $this->line('');

        if ($this->confirm("Proceed with the migration creation? [Yes|no]")) {
            $this->line('');
            $this->info( "Creating migration and seeder..." );

            if ($this->createMigration( 'countries')) {
                $this->line('');

                if (version_compare(app()->version(), '5.5.0', '<')) {
                    $this->call('optimize', []);
                }

                $this->line('');
                $this->info( "Migration successfully created!" );
            } else {
                $this->error( 
                    "Coudn't create migration.\n Check the write permissions " .
                    "within the app/database/migrations directory."
                );
            }

            $this->line('');
        }
    }

    /**
     * Alias fire method.
     *
     * @return void
     */
    public function handle()
    {
        $this->fire();
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

    /**
     * Create the migration
     *
     * @param  string $name
     * @return bool
     */
    protected function createMigration()
    {
        $migration_path = $this->laravel->path . '/../database/migrations/';
        $seed_path = $this->laravel->path . '/../database/seeds/';


        // create the migration files

        $migrationFiles = [
            $migration_path . '*_setup_countries_table.php' => 'countries::generators.migration',
            $migration_path . '*_charify_countries_table.php' => 'countries::generators.char_migration',
        ];

        $seconds = 0;

        foreach ($migrationFiles as $migrationFile => $view) {            
            if (sizeof(glob($migrationFile)) == 0) {
                $migrationFile = str_replace('*', date('Y_m_d_His', strtotime("+{$seconds} seconds")), $migrationFile);

                $fs = fopen($migrationFile, 'x');
                if ($fs) {
                    $output = "<?php\n\n" . view($view, [ 'table' => 'countries' ])->render();
                    fwrite($fs, $output);
                    fclose($fs);
                } else {
                    return false;
                }

                $seconds++;
            }
        }


        // create the seeder

        if (!file_exists($seeder_file)) {
            $seeder_file = $seed_path . 'CountriesSeeder.php';
            $output = "<?php\n\n" . view('countries::generators.seeder')->render();

            $fs = fopen($seeder_file, 'x');
            if ($fs) {
                fwrite($fs, $output);
                fclose($fs);
            } else {
                return false;
            }
        }

        return true;
    }
}
