<?php

use Illuminate\Database\Seeder;
use App\Smile\Posts\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = '<p>Quisque ligulas ipsum, euismod atras vulputate iltricies etri elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nulla nunc dui, tristique in semper vel, congue sed ligula. Nam dolor ligula, faucibus id sodales in, auctor fringilla libero. Pellentesque pellentesque tempor tellus eget hendrerit. Morbi id aliquam ligula. Aliquam id dui sem. Proin rhoncus consequat nisl, eu ornare mauris tincidunt vitae. Vestibulum sodales ante a purus volutpat euismod. Proin sodales quam nec ante sollicitudin lacinia. Ut egestas bibendum tempor. Morbi non nibh sit amet ligula blandit ullamcorper in nec risus. Pellentesque fringilla diam faucibus tortor bibendum vulputate. Etiam turpis urna, rhoncus et mattis ut, dapibus eu nunc. Nunc sed aliquet nisi. Nullam ut magna non lacus adipiscing volutpat. Aenean odio mauris, consectetur quis consequat quis, blandit a nunc. Sed orci erat, placerat ac interdum ut, suscipit eu augue. Nunc vitae mi tortor. Ut vel justo quis lectus elementum ullamcorper volutpat vel libero.</p><blockquote> <p>Donec volutpat nibh sit amet libero ornare non laoreet arcu luctus. Donec id arcu quis mauris euismod placerat sit amet ut metus. Sed imperdiet fringilla sem eget euismod. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Pellentesque adipiscing, neque ut pulvinar tincidunt, est sem euismod odio, eu ullamcorper turpis nisl sit amet velit. Nullam vitae nibh odio, non scelerisque nibh. Vestibulum ut est augue, in varius purus.</p></blockquote><p>Proin dictum lobortis justo at pretium. Nunc malesuada ante sit amet purus ornare pulvinar. Donec suscipit dignissim ipsum at euismod. Curabitur malesuada lorem sed metus adipiscing in vehicula quam commodo. Sed porttitor elementum elementum. Proin eu ligula eget leo consectetur sodales et non mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui lectus, pharetra nec elementum eget, vulputate ut nisi. Aliquam accumsan, nulla sed feugiat vehicula, lacus justo semper libero, quis porttitor turpis odio sit amet ligula. Duis dapibus fermentum orci, nec malesuada libero vehicula ut. Integer sodales, urna eget interdum eleifend, nulla nibh laoreet nisl, quis dignissim mauris dolor eget mi. Donec at mauris enim. Duis nisi tellus, adipiscing a convallis quis, tristique vitae risus. Nullam molestie gravida lobortis. Proin ut nibh quis felis auctor ornare. Cras ultricies, nibh at mollis faucibus, justo eros porttitor mi, quis auctor lectus arcu sit amet nunc. Vivamus gravida vehicula arcu, vitae vulputate augue lacinia faucibus.</p><p>Ut porttitor euismod cursus. Mauris suscipit, turpis ut dapibus rhoncus, odio erat egestas orci, in sollicitudin enim erat id est. Sed auctor gravida arcu, nec fringilla orci aliquet ut. Nullam eu pretium purus. Maecenas fermentum posuere sem vel posuere. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ornare convallis lectus a faucibus. Praesent et urna turpis. Fusce tincidunt augue in velit tincidunt sed tempor felis porta. Nunc sodales, metus ut vestibulum ornare, est magna laoreet lectus, ut adipiscing massa odio sed turpis. In nec lorem porttitor urna consequat sagittis. Nullam eget elit ante. Pellentesque justo urna, semper nec faucibus sit amet, aliquam at mi. Maecenas eget diam nec mi dignissim pharetra.</p>';
        $data = array(
            [
                'user_id' => 1,
                'title' => 'Vitae Oulputate Augue Lacinia',
                'thumbnail' => 'images/picture2.jpg',
                'content' =>  $content,
                'taxonomy_id' => 1,
                'status' => POST_STATUS_ACTIVATED,
                'options' => json_encode([])
            ],
            [
                'user_id' => 2,
                'title' => 'Donec Suscipit Dim Euismods',
                'thumbnail' => 'images/picture2.jpg',
                'content' =>  $content,
                'taxonomy_id' => 1,
                'status' => POST_STATUS_DRAFT,
                'options' => json_encode([])
            ],
            [
                'user_id' => 1,
                'title' => 'Vitae Oulputate Augue Lacinia',
                'thumbnail' => 'images/picture2.jpg',
                'content' =>  $content,
                'taxonomy_id' => 1,
                'status' => POST_STATUS_DEACTIVATED,
                'options' => json_encode([])
            ],
            [
                'user_id' => 2,
                'title' => 'Donec Suscipit Dim Euismods',
                'thumbnail' => 'images/picture2.jpg',
                'content' =>  $content,
                'taxonomy_id' => 1,
                'status' => POST_STATUS_ACTIVATED,
                'options' => json_encode([])
            ]
        );

        foreach($data as $item){
            $item['slug'] = str_slug($item['title']);
            Post::create($item);
        }
    }
}
