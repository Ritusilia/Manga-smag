<?php

namespace App\DataFixtures;

use App\Products\Entity\Product;
use App\Users\Entity\User;
use App\Users\Service\UserPasswordHasherInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function __construct(private readonly UserPasswordHasherInterface $passwordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User('Admin', 'admin@admin.ru');
        $user->setPassword(
            'kYIrg3SMv5aOPZKMpPWi1sMoCmJbYXL',
            $this->passwordHasher
        );
        $manager->persist($user);

        // `name`, `code`, `price`, `description`, `image`
        $productsLegacy = [
            ['Человек-Бензопила. Книга 1.', 1, 300, 'Дэндзи – обычный молодой человек, который промышляет охотой на демонов, чтобы расплатиться с долгами покойного отца. Если он хоть раз опоздает с выплатой, его ждет смерть. Дэндзи живет в крошечной лачуге со своим демоническим псом-бензопилой по имени Почита и едва сводит концы с концами. Все о чем он мечтает – ходить на свидания с девушкой и есть хлеб с джемом. Но у судьбы на него другие планы…\r\nВ один прекрасный день юноша обретает сверхъестественные силы, позволяющие ему превращать свое тело в живое оружие. Дэндзи вырывается из нищеты и под рев дребезжащих бензопил и крики умирающих демонов начинает прорезать себе дорогу в новую жизнь...', '/upload/images/product/15.webp'],
            ['Человек-Бензопила. Книга 2.', 2, 800, ' Дэндзи и его бензопила теперь на службе в специальном четвёртом отделе Бюро общественной безопасности. Отдел под руководством Макимы уничтожает демонов. Дэндзи ради простых житейских радостей готов кромсать на части самых жутких демонов. Например невероятно сильного демона-огнестрела: там, где он был, оставались тысячи трупов.', '/upload/images/product/16.webp'],
            ['Человек-Бензопила. Книга 3.', 3, 800, 'Операция специального четвертого отдела в самом разгаре!\r\nПока демоны и одержимые расправляются с ордами зомби, Аки Хаякава встречается лицом к лицу с Саватари, причастной к убийству его напарницы. Таинственная незнакомка сходу использует грязный прием: она натравливает на Хаякаву призрака, некогда помогавшего Химэно. Вот только Саватари не в курсе, что Аки заключил договор с еще одним демоном и теперь обладает новыми силами…\r\nТем временем Дэндзи вновь сталкивается с якудза, мечтающим отомстить за смерть своего дедушки. Прошлое сражение обернулось поражением для молодого охотника. Чем же закончится очередная битва?..\r\n\r\n', '/upload/images/product/17.webp'],
            ['Человек-Бензопила. Книга 4.', 4, 800, 'После ожесточенной схватки с Рэдзэ в жизни Дэндзи происходит внезапный поворот: юноша попадает в центр внимания СМИ. Практически все новостные каналы трубят об ужасающем демоне-бензопиле, объявившемся в Токио. Макима высказывает предположение, что теперь лидеры остальных стран во что бы то ни стало захотят заполучить такое редкое существо, как Дэндзи.\r\nИнтуиция не обманывает главу спецотдела: в Японию начинают стягиваться лучшие наемники со всего света... И у каждого из них заключен договор с опаснейшим демоном.', '/upload/images/product/18.webp'],
            ['Человек-Бензопила. Книга 5.', 5, 800, 'Вернувшиеся из ада зализывают раны и принимают ванну. В ванной ощущается прилив нежной Power. Но оказалось, что Дэндзи не нужны такие нежности – он хочет стать собакой. Демон-огнестрел проносится по Японии, убивая людей. Все эти странные вещи происходят в манге «Человек-бензопила. Книга 5. Купание в ванне. Чувства собаки».\r\nСанта-Клаус, несмотря на имя, хорошо взгрел охотников на демонов и даже утащил их в ад. Вернулись оттуда Дэндзи, Аки и Пауэр чуть иными. Аки сблизился со своими нерадивыми подопечными, и теперь он чувствует ещё большую ответственность за них. А ещё Хаякава понял, что есть нечто большее в жизни, чем месть. И это накануне битвы с демоном-огнестрелом!\r\nПауэр не может забыть то, что испытала во время схватки с демонами в аду, и повсюду следует за Дэндзи – в буквальном смысле. Она с ним и в ванную ходит, и спит. Дэндзи мечтал о таком ещё недавно, но сейчас ощущает нечто странное. Это чувство находит выход в виде необычного признания Макиме. А Макима вот-вот покажет своё истинное лицо… когда в Японию нагрянет демон – огнестрельное оружие.', '/upload/images/product/19.webp'],
            ['Человек-Бензопила. Книга 6.', 6, 800, 'Дэндзи превращается в Человека-Бензопилу и вступает в ожесточенную схватку с демоном-завоеванием и ее приспешниками, олицетворяющими различное оружие. Но каким бы сильным ни был Дэндзи, его противники отступать не намерены: они пойдут на все, лишь бы одержать верх над юношей. Это будет битва до последней капли крови, где малейшая ошибка может привести к смерти. Сможет ли Человек-Бензопила одолеть своих врагов? Или же рев его мотора заглохнет навсегда?..', '/upload/images/product/20.webp'],
            ['Магическая битва. Том 0.', 7, 900, 'Юта Оккоцу – юноша с несчастной судьбой: его возлюбленная Рика Оримото погибла в результате несчастного случая, однако ее душа так и не смогла упокоиться… И теперь Рика повсюду сопровождает Юту в виде проклятого духа, которого невозможно обуздать или контролировать.\r\nОтчаявшийся молодой человек решает запереться в темной комнате, боясь причинить боль окружающим. Но помощь приходит, откуда не ждали: маг по имени Сатору Годзё предлагает Юте поступить в Токийский магический колледж, где ему помогут научиться контролировать собственное проклятие.\r\nЮта соглашается на предложение, даже не подозревая, что вскоре окажется втянут в грядущую войну магов…', '/upload/images/product/21.webp'],
            ['Магическая битва. Том 1.', 8, 900, 'В альтернативной реальности «Магической битвы» основам магии учат в учебных заведениях, а рядом с людьми, скрываясь от излишнего внимания, живут порождаемые человеческими эмоциями демоны, всегда готовые съесть зазевавшегося человека. В этом скрытом мире существует легенда о могущественном демоне, который однажды был повержен, а его тело было разделено на части. Эти фрагменты спрятаны в разных тайниках, и тот демон, который отыщет все и поглотит их, станет таким сильным, что сможет уничтожить мир…', '/upload/images/product/22.webp'],
            ['Магическая битва. Том 2.', 9, 900, 'Юдзи вернулся, у него новый старший напарник – им предстоит весьма любопытное расследование. В одном из кинотеатров обнаружены тела трёх старшеклассников с деформированными головами. Маги приходят к выводу, что причина столь жуткой насильственной смерти – проклятие. Есть свидетель убийства, и Юдзи Итадори приставлен следить за ним. Что-то страшное грядёт…', '/upload/images/product/23.webp'],
            ['Магическая битва. Том 3.', 10, 900, 'Программа обмена опытом для магов Киотского колледжа стала удобным прикрытием, чтобы исполнить задуманное: изгнать любой ценой Сукуну из Юдзи Итадори. В Токийском колледже не желают допустить смерть одного из своих – и вот магические битвы между заклинателями двух колледжей ведутся за жизнь Юдзи. В пылу сражений маги даже не подозревают о появлении Махито с сообщниками…\r\n\r\nВ третью книгу вошли тома 5 и 6 («Командный бой» и «Чёрная вспышка»), что соответствует главам 35–52, а также авторские заметки между главами и примечания.', '/upload/images/product/24.webp'],
            ['Наруто. Книга 1.', 11, 500, 'Наруто Удзумаки – самый проблемный ученик академии ниндзя в деревне Коноха. День за днем он выдумывает всяческие проказы и выводит из себя окружающих! Однако даже у этого хулигана есть заветная мечта. Он собирается превзойти героев прошлого, стать величайшим ниндзя и обрести всеобщее признание! Но люди сторонятся юного Удзумаки, а кто-то даже смотрит на него с отвращением… Наруто и не подозревает, что его жизнь связана с трагедией, постигшей Коноху двенадцать лет назад…', '/upload/images/product/25.webp'],
            ['Наруто. Книга 2.', 12, 500, 'Став настоящими ниндзя, Наруто, Саскэ и Сакура получают ответственное задание – охранять знаменитого строителя мостов Тадзуну из Страны Волн. На жизнь этого старика покушаются беглый синоби Дзабудза и его подопечный Хаку, обладающий невероятными способностями. Столкновение с такими опасными противниками оборачивается трагедией, когда Саскэ закрывает собой Наруто от смертоносной атаки Хаку… Кажется, участь команды Какаси уже предрешена, но в Наруто вдруг пробуждается загадочная сила… Сможет ли он переломить ход битвы?', '/upload/images/product/26.webp'],
            ['Наруто. Книга 3.', 13, 500, 'Вступительные экзамены на звание тюнина оказались по-настоящему опасными. После серьёзного сражения в Лесу Смерти и встречи со странным ниндзя по имени Оротимару, Сакуре в одиночку придётся встать на защиту Наруто и Саскэ. И это ещё только первый этап, и дальше задания в экзамене будут только усложняться! Чья команда дойдёт до финала в этой смертельной битве?\r\n\r\nТакже в том вошли автобиографические заметки «Мир Масаси Кисимото» и рейтинг популярности персонажей манги.', '/upload/images/product/27.webp'],
            ['Наруто. Книга 4.', 14, 500, 'У команды Наруто путь свой – во время экзамена на звание тюнина разгорается нешуточная борьба за свитки. После суровых испытаний первого этапа и нападения Оротимару во время сражений в Лесу Смерти на втором этапе кажется, что до финала всего ничего. Только вот легко не будет до самого конца! Претендентов всё ещё слишком много, и перед финалом для бойцов из семи оставшихся команд подготовлено новое испытание – отборочные поединки один на один.', '/upload/images/product/28.webp'],
            ['Наруто. Книга 5.', 15, 500, 'Финальный этап экзамена на звание тюнина в самом разгаре! Благодаря тренировкам с Дзирайей Наруто сумел воспользоваться неиссякаемой чакрой Девятихвостого и победить Нэдзи, признанного гения клана Хюга. А Сикамару, которому удалось перехватить инициативу под конец поединка, вдруг сдался своей сопернице Тэмари. Однако самое ожидаемое сражение дня все откладывается, и зрители начинают роптать… Но внезапно Саскэ появляется посреди арены в сопровождении мастера Какаси! Значит, бой все-таки состоится. Вот только сможет ли Саскэ одолеть жаждущего крови Гаару?..', '/upload/images/product/29.webp'],
            ['Наруто. Книга 6.', 16, 500, 'Во время третьего этапа экзамена на звание тюнина, прямо перед решающим боем Саскэ и Гаары на Деревню, Скрытую в Листве совершает нападение из засады Оротимару. Смертельная схватка между третьим хокагэ и Оротимару и очень трудно давшееся Саскэ противостояние натиску Гаары – два боя, два разных финала. В одном случае на подмогу придут друзья, в другом – цена победы запредельно высока… Вторжение в деревню будет остановлено, но вот уже новые мрачные тени сгущаются над героями…', '/upload/images/product/30.webp'],
            ['Наруто. Книга 7.', 17, 500, 'Решимость Наруто помогает Цунадэ развеять собственные сомнения и сделать правильный выбор. Она отказывается исцелять руки тому, кто вознамерился уничтожить Деревню, Скрытую в Листве. Тогда Оротимару и Кабуто идут на отчаянный шаг и нападают на Цунадэ, чтобы силой заставить ее помочь им, раз она не желает делать это по доброй воле. Несмотря на невероятные способности легендарной куноити, сражение грозит закончиться для нее плачевно… К счастью, на поле боя вдруг появляются Дзирайя, Наруто и Сидзунэ! Но сумеет ли эта троица повлиять на исход битвы?..\r\nВ книгу вошли главы 163–190.', '/upload/images/product/31.webp'],
            ['Наруто. Книга 8.', 18, 500, 'Сикамару, Наруто, Тёдзи, Нэдзи и Киба быстро настигают Четвёрку Звука, но противники разделяются: двоих берут на себя Тёдзи и Нэдзи, а остальные продолжают преследование негодяев, с которыми ушёл Саскэ. Наруто предстоит схватка с Кимимаро. Мастерство Деревни, Скрытой в Листве против мастерства Деревни, Скрытой в Звуке!\r\n\r\nВ восьмую книгу вошли тома 22–24 («Перерождение», «Критическая ситуация!..» и «Тройная угроза!!!»), что соответствует главам со 191 по 217. Также в книге между главами Масаси Кисимото продолжает автобиографические заметки. В конце книги – примечания.', '/upload/images/product/32.webp'],
            ['Наруто. Книга 9.', 19, 500, 'Как переубедить того, кто уже всё для себя решил? Непростая задача стоит перед Наруто: он не просто должен победить Саскэ, своего товарища, но убедить его не оставлять родную деревню. Во время боя юный ниндзя из клана Утиха вспоминает детство и семью – отца, мать и брата, из-за которого Саскэ и принял предложение врага. Выходит, он уже твёрдо принял решение? В сравнении с миссией Наруто Удзумаки кажутся пустяками трудности, выпавшие на долю его товарищей по отряду, отправившихся за Оротимару…', '/upload/images/product/33.webp'],
            ['Без игры жизни нет. Том 1.1.', 20, 600, 'Издание содержит цветные иллюстрации. 18-летний Сора и 11-летняя Сиро – сводные брат и сестра, затворники, не очень-то ладящие с реальным миром, который они считают не более чем \"отстойной игрой\". Зато они прославились на весь интернет благодаря своему мастерству в играх. И вот однажды незнакомец, представившийся богом, предлагает им отправиться в другой, правильный и логичный мир, где все конфликты решаются с помощью игр...', '/upload/images/product/34.webp'],
            ['Без игры жизни нет. Том 1.2.', 21, 600, 'Издание содержит цветные иллюстрации.\r\n\r\nСора и Сиро — брат и сестра. Они — хикикомори, нигде не работают и не учатся, но прославились на весь Интернет благодаря мастерству в играх. Реальный мир они считают не более чем «отстойной игрой». И вот однажды незнакомец, называющий себя богом, предлагает им отправиться в другой мир, где все конфликты решаются при помощи игр, а расе людей грозит полное уничтожение... Смогут ли Сора и Сиро стать спасителями человечества в чужом мире?', '/upload/images/product/35.webp'],
            ['Без игры жизни нет. Том 2.1.', 22, 600, 'Издание содержит цветные иллюстрации.\r\n\r\nСора и Сиро — брат и сестра. Они — хикикомори, нигде не работают и не учатся, но прославились на весь Интернет благодаря мастерству в играх. Попав по приглашению незнакомца, называющего себя богом, в параллельный мир, где все конфликты решаются с помощью игр, они в мгновение ока завоевали трон страны иманити. Что делать дальше? Разумеется, примериваться к соседней! А страна эта – Восточный Союз, третья по могуществу держава в мире, и населяют ее звервольфы – то есть зверолюди. Состязание с другими расами начинается!', '/upload/images/product/36.webp'],
            ['Без игры жизни нет. Том 2.2.', 23, 600, 'Однажды незнакомец, называющий себя богом, предлагает Соре и Сиро, парочке заядлых геймеров, отправиться в другой мир, где все конфликты решаются с помощью игр. Но обнаруживается, что человечество тут в отчаянном положении: последние оставшиеся земли людей вот-вот отойдут враждебным государствам. Брат с сестрой решают принять участие в турнире, приз в котором - королевский титул. Им предстоит сразиться с очень опасной противницей - таинственной Кламми Целл, которая использует эльфийскую магию.. Смогут ли они стать спасителями человечества в чужом мире?', '/upload/images/product/37.webp'],
            ['Без игры жизни нет. Том 3.', 24, 600, 'Сора и Сиро — брат и сестра. Они — хикикомори, нигде не работают и не учатся, но прославились на весь Интернет благодаря мастерству в играх. Попав в Дисборд – мир, где все решается с помощью игр, – они бросили вызов Восточному Союзу, третьей по величине державе мира, стране звервольфов, потребовав материковые территории Союза и поставив тем самым на кон судьбу всего человечества. Но прямо перед игрой Сора, оставив сестре непонятные напутствия, вдруг куда-то пропал. 「 」, единый игрок в двух телах, оказался разделен... Грядет опасная, словно ходьба по канату, схватка с расой звервольфов!', '/upload/images/product/38.webp'],
            ['Без игры жизни нет. Том 4.', 26, 600, 'Издание содержит цветные иллюстрации. Сора и Сиро - брат и сестра. Они - хикикомори, нигде не работают и не учатся, но прославились на весь Интернет благодаря мастерству в играх. Попав в Дисборд - мир, где все решается при помощи игр, - они одержали несколько блестящих побед над противниками, владеющими магией и сверхспособностями, и бросили вызов самому Единому Богу. Когда наши герои наслаждаются заслуженным отдыхом в Восточном Союзе, им наносит визит дампир по имени Прэм. Прэм умоляет Сору и Сиро спасти свою расу, находящуюся на грани исчезновения, и для этого нужно… победить в любовном симуляторе! На первый взгляд задание выглядит довольно просто... Что же может пойти не так?..', '/upload/images/product/39.webp'],
            ['Без игры жизни нет. Том 5.', 27, 600, 'Сора и Сиро — брат и сестра. Они — хикикомори, нигде не работают и не учатся, но прославились на весь Интернет благодаря мастерству в играх. Попав в Дисборд — мир, где все решается при помощи игр, — они стали правителями человечества и задумали объединить все расы и бросить вызов Единому Богу. Так и не найдя способ выиграть в игре королевы сирен, брат с сестрой отправляются за информацией в город крылатых, Авант Хейм! Смогут ли они найти общий язык с расой, созданной для войны с самими богами? Предстоит покорить и море, и небеса, завоевав одним махом сразу три народа!', '/upload/images/product/40.webp'],
            ['Без игры жизни нет. Том 6.', 28, 600, 'Пришло время вступить в игру!\r\n\r\nЗа несколько тысяч лет до того, как Сора и Сиро попали в Дисборд и началась легенда, известная всем, имела иместо другая легенда — всеми забытая.\r\n\r\nЭто история о великой войне, которая длилась испокон веков, о том, как выжженную землю удобряла кровь, а с багровых небес, не прекращая, падал пепел. О том, как слабы и беспомощны были люди, которые даже не надеялись на счастье и пытались просто выжить, чтобы хотя бы их потомки когда-нибудь увидели что-то кроме этой войны. И о мужчине и девушке, которые решили положить ей конец и бросили вызов всему миру, решив считать происходящее просто игрой.\r\n\r\nПравдива эта история или нет? А так ли это важно?', '/upload/images/product/41.webp'],
            ['Жизнь бродячего кота. Том 1', 30, 400, 'Нанао и Мати ― бродячие коты, для которых каждый день может стать последним. Люди для них ― просто источник пропитания или даже враждебное окружение. Однажды судьба сводит их с Ёсино Наритой, ненавидящей кошек, и эта встреча ничем хорошим не заканчивается. Но именно она послужит началом больших перемен в жизни двух котов и одного человека.', '/upload/images/product/42.webp'],
            ['Жизнь бродячего кота. Том 2.', 43, 500, 'Нанао и Мати ― бродячие коты, для которых каждый день может стать последним. Люди для них ― просто источник пропитания или даже враждебное окружение. Однажды судьба сводит их с Ёсино Наритой, ненавидящей кошек, и эта встреча ничем хорошим не заканчивается. Но именно она послужит началом больших перемен в жизни двух котов и одного человека.', '/upload/images/product/45.webp'],
            ['Жизнь бродячего кота. Том 3.', 44, 500, 'Нанао и Мати ― бродячие коты, для которых каждый день может стать последним. Люди для них ― просто источник пропитания или даже враждебное окружение. Однажды судьба сводит их с Ёсино Наритой, ненавидящей кошек, и эта встреча ничем хорошим не заканчивается. Но именно она послужит началом больших перемен в жизни двух котов и одного человека.', '/upload/images/product/46.webp']
        ];

        foreach ($productsLegacy as $item) {
            $product = new Product(
            // 0 `name`, 1 `code`, 2 `price`, 3 `description`, 4 `image`
                $item[0],
                $item[1],
                $item[2],
                $item[3],
                $item[4]
            );
            $manager->persist($product);
        }


        $manager->flush();
    }
}
