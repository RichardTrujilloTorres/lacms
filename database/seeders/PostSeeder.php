<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * @var User $dummyUser
         */
        $dummyUser = User::findOrFail(11);
        /**
         * @var User $secondDummyUser
         */
        $secondDummyUser = User::findOrFail(20);

        $posts = [
            [
                'user_id' => $dummyUser->id,
                'title' => 'Test post 1',
                'body' => '
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget auctor dolor. Nullam sed rutrum ex. Donec suscipit nulla sodales enim rhoncus facilisis. Nulla a lacus efficitur, elementum magna quis, convallis felis. Fusce imperdiet ante nunc, nec egestas ante gravida vel. In a interdum tellus. Nam venenatis mauris in ante auctor venenatis. Suspendisse eget blandit ante. Aliquam erat volutpat. Nam ultricies, nulla feugiat faucibus efficitur, massa lacus finibus tellus, non venenatis purus libero nec risus. Integer a tempus diam, sed elementum eros. Aenean porttitor auctor lacus, sed tincidunt lorem vehicula non.
                </p>
                <p>

Aliquam a vulputate neque. Maecenas elit purus, vulputate pellentesque condimentum ut, eleifend et elit. Sed maximus orci sed pulvinar iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean cursus placerat urna. Etiam eget accumsan ante, at dapibus erat. Proin eget tristique sapien, sed finibus orci. Quisque facilisis, turpis vel tristique rhoncus, nisi dui dictum sapien, vitae facilisis purus diam vel ante. Pellentesque molestie blandit ornare. Cras at purus at eros rutrum ultricies. Curabitur auctor magna ac sem sagittis, in dictum tellus tincidunt. Ut euismod, quam eget dignissim imperdiet, erat ligula tempus massa, euismod laoreet massa ipsum condimentum magna. Aliquam maximus massa dui, nec vestibulum nunc mollis a.

Etiam cursus aliquam lacus, sed scelerisque felis tristique vitae. Nam nec commodo lectus, eu placerat quam. Aenean lectus dolor, pellentesque quis nisi et, euismod sollicitudin urna. Duis vitae lobortis odio, nec scelerisque justo. Vestibulum euismod urna eget dapibus vehicula. Nullam consectetur leo urna, ac iaculis metus suscipit sit amet. Mauris et dapibus nisi. Maecenas et sapien id lacus aliquet auctor vitae in augue. Etiam bibendum nibh nulla, id lacinia libero commodo nec. Praesent quis porttitor mi, non viverra nulla. Phasellus auctor libero dui, vitae malesuada tortor convallis non. In sodales augue ut porttitor consequat. Proin euismod posuere ligula a mollis. Suspendisse sit amet sem bibendum, ornare velit ut, interdum ligula. Phasellus nec tristique purus.

Sed dolor ante, pellentesque non elit eu, porttitor commodo diam. Sed vitae nulla suscipit, vulputate erat vel, ultricies est. Proin ullamcorper nibh ipsum, ac aliquet est vehicula vitae. Integer ac facilisis leo, dapibus condimentum massa. Aliquam venenatis tempus lorem eu porttitor. Quisque sollicitudin ullamcorper dui, ac vulputate massa ornare nec. In pretium nec odio vitae scelerisque. Sed fermentum, urna ac lacinia vulputate, orci justo tincidunt dolor, ac scelerisque lacus est et sem. Quisque nec nunc eu metus pulvinar porttitor at in ante. Nulla ornare mauris massa.

Maecenas maximus a elit et tincidunt. Ut enim massa, interdum vel diam at, ultricies vestibulum ipsum. Suspendisse imperdiet erat eget nisi lobortis, sed faucibus lorem sollicitudin. Praesent laoreet massa ligula, a tincidunt nisi rhoncus in. Ut cursus ac lacus ut porta. Mauris volutpat sagittis arcu vel congue. Nullam tincidunt, elit a faucibus tempor, est nibh rhoncus ligula, sed vestibulum erat sem nec nulla. Vivamus eget augue quis purus sollicitudin dictum. Morbi sit amet semper lorem. Aliquam nec tempor dolor. Sed molestie eros dolor, sagittis pulvinar diam consectetur sit amet.
</p>
                ',
            ],
            [
                'user_id' => $dummyUser->id,
                'title' => 'Test post 2',
                'body' => '
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget auctor dolor. Nullam sed rutrum ex. Donec suscipit nulla sodales enim rhoncus facilisis. Nulla a lacus efficitur, elementum magna quis, convallis felis. Fusce imperdiet ante nunc, nec egestas ante gravida vel. In a interdum tellus. Nam venenatis mauris in ante auctor venenatis. Suspendisse eget blandit ante. Aliquam erat volutpat. Nam ultricies, nulla feugiat faucibus efficitur, massa lacus finibus tellus, non venenatis purus libero nec risus. Integer a tempus diam, sed elementum eros. Aenean porttitor auctor lacus, sed tincidunt lorem vehicula non.
                </p>
                <p>

Aliquam a vulputate neque. Maecenas elit purus, vulputate pellentesque condimentum ut, eleifend et elit. Sed maximus orci sed pulvinar iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean cursus placerat urna. Etiam eget accumsan ante, at dapibus erat. Proin eget tristique sapien, sed finibus orci. Quisque facilisis, turpis vel tristique rhoncus, nisi dui dictum sapien, vitae facilisis purus diam vel ante. Pellentesque molestie blandit ornare. Cras at purus at eros rutrum ultricies. Curabitur auctor magna ac sem sagittis, in dictum tellus tincidunt. Ut euismod, quam eget dignissim imperdiet, erat ligula tempus massa, euismod laoreet massa ipsum condimentum magna. Aliquam maximus massa dui, nec vestibulum nunc mollis a.

Etiam cursus aliquam lacus, sed scelerisque felis tristique vitae. Nam nec commodo lectus, eu placerat quam. Aenean lectus dolor, pellentesque quis nisi et, euismod sollicitudin urna. Duis vitae lobortis odio, nec scelerisque justo. Vestibulum euismod urna eget dapibus vehicula. Nullam consectetur leo urna, ac iaculis metus suscipit sit amet. Mauris et dapibus nisi. Maecenas et sapien id lacus aliquet auctor vitae in augue. Etiam bibendum nibh nulla, id lacinia libero commodo nec. Praesent quis porttitor mi, non viverra nulla. Phasellus auctor libero dui, vitae malesuada tortor convallis non. In sodales augue ut porttitor consequat. Proin euismod posuere ligula a mollis. Suspendisse sit amet sem bibendum, ornare velit ut, interdum ligula. Phasellus nec tristique purus.

Sed dolor ante, pellentesque non elit eu, porttitor commodo diam. Sed vitae nulla suscipit, vulputate erat vel, ultricies est. Proin ullamcorper nibh ipsum, ac aliquet est vehicula vitae. Integer ac facilisis leo, dapibus condimentum massa. Aliquam venenatis tempus lorem eu porttitor. Quisque sollicitudin ullamcorper dui, ac vulputate massa ornare nec. In pretium nec odio vitae scelerisque. Sed fermentum, urna ac lacinia vulputate, orci justo tincidunt dolor, ac scelerisque lacus est et sem. Quisque nec nunc eu metus pulvinar porttitor at in ante. Nulla ornare mauris massa.

Maecenas maximus a elit et tincidunt. Ut enim massa, interdum vel diam at, ultricies vestibulum ipsum. Suspendisse imperdiet erat eget nisi lobortis, sed faucibus lorem sollicitudin. Praesent laoreet massa ligula, a tincidunt nisi rhoncus in. Ut cursus ac lacus ut porta. Mauris volutpat sagittis arcu vel congue. Nullam tincidunt, elit a faucibus tempor, est nibh rhoncus ligula, sed vestibulum erat sem nec nulla. Vivamus eget augue quis purus sollicitudin dictum. Morbi sit amet semper lorem. Aliquam nec tempor dolor. Sed molestie eros dolor, sagittis pulvinar diam consectetur sit amet.
</p>
                ',
            ],
            [
                'user_id' => $secondDummyUser->id,
                'title' => 'Test post 3',
                'body' => '
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget auctor dolor. Nullam sed rutrum ex. Donec suscipit nulla sodales enim rhoncus facilisis. Nulla a lacus efficitur, elementum magna quis, convallis felis. Fusce imperdiet ante nunc, nec egestas ante gravida vel. In a interdum tellus. Nam venenatis mauris in ante auctor venenatis. Suspendisse eget blandit ante. Aliquam erat volutpat. Nam ultricies, nulla feugiat faucibus efficitur, massa lacus finibus tellus, non venenatis purus libero nec risus. Integer a tempus diam, sed elementum eros. Aenean porttitor auctor lacus, sed tincidunt lorem vehicula non.
                </p>
                <p>

Aliquam a vulputate neque. Maecenas elit purus, vulputate pellentesque condimentum ut, eleifend et elit. Sed maximus orci sed pulvinar iaculis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aenean cursus placerat urna. Etiam eget accumsan ante, at dapibus erat. Proin eget tristique sapien, sed finibus orci. Quisque facilisis, turpis vel tristique rhoncus, nisi dui dictum sapien, vitae facilisis purus diam vel ante. Pellentesque molestie blandit ornare. Cras at purus at eros rutrum ultricies. Curabitur auctor magna ac sem sagittis, in dictum tellus tincidunt. Ut euismod, quam eget dignissim imperdiet, erat ligula tempus massa, euismod laoreet massa ipsum condimentum magna. Aliquam maximus massa dui, nec vestibulum nunc mollis a.

Etiam cursus aliquam lacus, sed scelerisque felis tristique vitae. Nam nec commodo lectus, eu placerat quam. Aenean lectus dolor, pellentesque quis nisi et, euismod sollicitudin urna. Duis vitae lobortis odio, nec scelerisque justo. Vestibulum euismod urna eget dapibus vehicula. Nullam consectetur leo urna, ac iaculis metus suscipit sit amet. Mauris et dapibus nisi. Maecenas et sapien id lacus aliquet auctor vitae in augue. Etiam bibendum nibh nulla, id lacinia libero commodo nec. Praesent quis porttitor mi, non viverra nulla. Phasellus auctor libero dui, vitae malesuada tortor convallis non. In sodales augue ut porttitor consequat. Proin euismod posuere ligula a mollis. Suspendisse sit amet sem bibendum, ornare velit ut, interdum ligula. Phasellus nec tristique purus.

Sed dolor ante, pellentesque non elit eu, porttitor commodo diam. Sed vitae nulla suscipit, vulputate erat vel, ultricies est. Proin ullamcorper nibh ipsum, ac aliquet est vehicula vitae. Integer ac facilisis leo, dapibus condimentum massa. Aliquam venenatis tempus lorem eu porttitor. Quisque sollicitudin ullamcorper dui, ac vulputate massa ornare nec. In pretium nec odio vitae scelerisque. Sed fermentum, urna ac lacinia vulputate, orci justo tincidunt dolor, ac scelerisque lacus est et sem. Quisque nec nunc eu metus pulvinar porttitor at in ante. Nulla ornare mauris massa.

Maecenas maximus a elit et tincidunt. Ut enim massa, interdum vel diam at, ultricies vestibulum ipsum. Suspendisse imperdiet erat eget nisi lobortis, sed faucibus lorem sollicitudin. Praesent laoreet massa ligula, a tincidunt nisi rhoncus in. Ut cursus ac lacus ut porta. Mauris volutpat sagittis arcu vel congue. Nullam tincidunt, elit a faucibus tempor, est nibh rhoncus ligula, sed vestibulum erat sem nec nulla. Vivamus eget augue quis purus sollicitudin dictum. Morbi sit amet semper lorem. Aliquam nec tempor dolor. Sed molestie eros dolor, sagittis pulvinar diam consectetur sit amet.
</p>
                ',
            ],
        ];

        Post::insert($posts);
    }
}
