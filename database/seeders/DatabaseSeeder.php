<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kategori;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Subkategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);
        $user->created_at = $user->freshTimestamp();
        $user->updated_at = $user->freshTimestamp();
        $user->save();

        // Kategori

        // skd
        $kategori_skd = Kategori::create([
            'kategori' => 'SKD',
        ]);
        $kategori_skd->created_at = $user->freshTimestamp();
        $kategori_skd->updated_at = $user->freshTimestamp();
        $kategori_skd->save();

        // Subkategori_skd
        // twk
        $subkategori_skd_twk = Subkategori::create([
            'kategori_id' => $kategori_skd->id,
            'sub_kategori' => 'TWK',
        ]);
        $subkategori_skd_twk->created_at = $user->freshTimestamp();
        $subkategori_skd_twk->updated_at = $user->freshTimestamp();
        $subkategori_skd_twk->save();

        // tiu
        $subkategori_skd_tiu = Subkategori::create([
            'kategori_id' => $kategori_skd->id,
            'sub_kategori' => 'TIU',
        ]);
        $subkategori_skd_tiu->created_at = $user->freshTimestamp();
        $subkategori_skd_tiu->updated_at = $user->freshTimestamp();
        $subkategori_skd_tiu->save();

        // tkp
        $subkategori_skd_tkp = Subkategori::create([
            'kategori_id' => $kategori_skd->id,
            'sub_kategori' => 'TKP',
        ]);
        $subkategori_skd_tkp->created_at = $user->freshTimestamp();
        $subkategori_skd_tkp->updated_at = $user->freshTimestamp();
        $subkategori_skd_tkp->save();


        // skb
        $kategori_skb = Kategori::create([
            'kategori' => 'SKB',
        ]);
        $kategori_skb->created_at = $user->freshTimestamp();
        $kategori_skb->updated_at = $user->freshTimestamp();
        $kategori_skb->save();
    }
}
