<?php

use Illuminate\Database\Seeder;

class MediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uploads = public_path(env('UPLOADS'));

        // récupère les noms des fichiers dans le dossier uploads
        $files = File::allFiles($uploads);

        // supprime physiquement les fichiers se trouvant dans le dossier
        foreach ($files as $file) {
            File::delete($file);
        }

        $posts = \App\Post::all();

        foreach ($posts as $post) {
            $uri = str_random(12) . '.jpg';

            $fileName = file_get_contents('http://lorempicsum.com/futurama/400/200/' . rand(1, 9));

            File::put(
                $uploads . DIRECTORY_SEPARATOR . $uri, $fileName
            );

            \App\Media::create([
                'post_id' => $post->id,
                'uri' => $uri,
                'title' => 'futurama'
            ]);






        }

    }
}
