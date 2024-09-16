<?php

use App\Models\hsc;
use Illuminate\Database\Seeder;
use App\Models\FacilityHierarchy;

class FacilityHierarchySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hscs = hsc::all();

        foreach ($hscs as $hsc) {
            // Insert into the facility_master table
            FacilityHierarchy::create([
                'facility_name' => $hsc->name,
                'facility_level_id' => 3,
                'district_id' => null,
                'block_id' => null,
                'phc_id' => null,
                'hsc_id' => $hsc->id,
                'hud_id' => null, 
            ]);
        }
    }
}
