<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enum_regions}}`.
 */
class m230808_042210_create_enum_regions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enum_regions}}', [
            'id'                => $this->integer(),
            'title_ru'          => $this->string(),
            'title_uz'          => $this->string(),
            'title_oz'          => $this->string(),
            'parent_id'         => $this->integer(),
            'is_deleted'        => $this->smallInteger()->defaultValue(0)->notNull(),
            'status'            => $this->smallInteger()->defaultValue(1)->notNull(),
            'order'             => $this->integer()
        ]);
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727206, 'Аккурганский р-н', 'Оққўрғон тум.', 1727, 'Oqqo`rg`on tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730405, 'г. Коканд', 'Қўқон ш.', 1730, 'Qo`qon sh.', 0, 16);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730412, 'г. Маргилан', 'Марғилон ш.', 1730, 'Marg`ilon sh.', 0, 19);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706230, 'Каракульский р-н', 'Қоракўл тум.', 1706, 'Qorako`l tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722214, 'Кумкурганский р-н', 'Қумқўрғон тум.', 1722, 'Qumqo`rg`on tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706240, 'Пешкунский р-н', 'Пешку тум.', 1706, 'Peshku tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706219, 'Каганский р-н', 'Когон тум.', 1706, 'Kogon tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730, 'Ферганская обл.', 'Фарғона вилояти', null, 'Farg`ona viloyati', 0, 65);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706204, 'Алатский р-н', 'Олот тум.', 1706, 'Olot tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735401, 'г. Нукус', 'Нукус ш.', 1735, 'Nukus sh.', 0, 18);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710242, 'Чиракчинский р-н', 'Чироқчи тум.', 1710, 'Chiroqchi tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733233, 'Янгиарыкский р-н', 'Янгиариқ тум.', 1733, 'Yangiariq tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724206, 'Акалтынский р-н', 'Оқолтин тум.', 1724, 'Oqoltin tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733220, 'Хазараспский р-н', 'Хазорасп тум.', 1733, 'Xazorasp tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714204, 'Мингбулакский p-н', 'Мингбулоқ тум.', 1714, 'Mingbuloq tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735, 'Республика Каракалпакстан', 'Қорақалпоғистон Республикаси', null, 'Qoraqalpog`iston Respublikasi', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703206, 'Балыкчинский р-н', 'Балиқчи тум.', 1703, 'Baliqchi tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706232, 'Караулбазарский р-н', 'Қоровулбозор тум.', 1706, 'Qorovulbozor tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703217, 'Улугноpский р-н', 'Улуғнор тум.', 1703, 'Ulug`nor tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703224, 'Асакинский р-н', 'Асака тум.', 1703, 'Asaka tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706242, 'Ромитанский р-н', 'Ромитан тум.', 1706, 'Romitan tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703220, 'Кургантепинский р-н', 'Қўрғонтепа тум.', 1703, 'Qo`rg`ontepa tum.', 0, 14);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708235, 'Фаришский р-н', 'Фориш тум.', 1708, 'Forish tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708237, 'Янгиабадский р-н', 'Янгиобод тум.', 1708, 'Yangiobod tum.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710220, 'Камашинский р-н', 'Қамаши тум.', 1710, 'Qamashi tum.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708223, 'Мирзачульский р-н', 'Мирзачўл тум.', 1708, 'Mirzacho`l tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708228, 'Пахтакорский р-н', 'Пахтакор тум.', 1708, 'Paxtakor tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727250, 'Пскентский р-н', 'Пскент тум.', 1727, 'Pskent tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735215, 'Кунградский р-н', 'Қўнғирот тум.', 1735, 'Qo`ng`irot tum.', 0, 15);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706258, 'Шафирканский р-н', 'Шофиркон тум.', 1706, 'Shofirkon tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708201, 'Арнасайский р-н', 'Арнасой тум.', 1708, 'Arnasoy tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710234, 'Мубарекский р-н', 'Муборак тум.', 1710, 'Muborak tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712244, 'Тамдынский р-н', 'Томди тум.', 1712, 'Tomdi tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718206, 'Булунгурский р-н', 'Булунғур тум.', 1718, 'Bulung`ur tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724228, 'Мирзаабадский р-н', 'Мирзаобод тум.', 1724, 'Mirzaobod tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718216, 'Кошрабатский р-н', 'Қўшработ тум.', 1718, 'Qo`shrabot tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703203, 'Андижанский р-н', 'Андижон тум.', 1703, 'Andijon tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703227, 'Мархаматский р-н', 'Марҳамат тум.', 1703, 'Marxamat tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703232, 'Пахтаабадский р-н', 'Пахтаобод тум.', 1703, 'Paxtaobod tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722201, 'Алтынсайский р-н', 'Олтинсой тум.', 1722, 'Oltinsoy tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718212, 'Иштыханский р-н', 'Иштихон тум.', 1718, 'Ishtixon tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714229, 'Уйчинский р-н', 'Уйчи тум.', 1714, 'Uychi tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733226, 'Хивинский р-н', 'Хива тум.', 1733, 'Xiva tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730230, 'Узбекистанский р-н', 'Ўзбекистон тум.', 1730, 'O`zbekiston tum.', 0, 15);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735243, 'Шуманайский р-н', 'Шуманай тум.', 1735, 'Shumanay tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735250, 'Элликкалинский р-н', 'Элликқалъа т.', 1735, 'Ellikqala t.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712211, 'Канимехский р-н', 'Конимех тум.', 1712, 'Konimex tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735212, 'Кегейлийский р-н', 'Кегейли тум.', 1735, 'Kegeyli tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727212, 'Ахангаранский р-н', 'Оҳангарон тум.', 1727, 'Ohangaron tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730226, 'Сохский р-н', 'Сўх тум.', 1730, 'So`x tum.', 0, 29);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727228, 'Букинский р-н', 'Бўка тум.', 1727, 'Bo`ka tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733221, 'Тупроккалинский р-н', 'Тупроққалъа тум.', 1733, 'Tuproqqal''a tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735207, 'Берунийский р-н', 'Беруний тум.', 1735, 'Beruniy tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730236, 'Дангаринский р-н', 'Данғара тум.', 1730, 'Dang`ara tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722217, 'Сариасийский р-н', 'Сариосиё тум.', 1722, 'Sariosiyo tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710245, 'Шахрисабзский р-н', 'Шаҳрисабз тум.', 1710, 'Shahrisabz tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718224, 'Пайарыкский р-н', 'Пайариқ тум.', 1718, 'Payariq tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718230, 'Пахтачийский р-н', 'Пахтачи тум.', 1718, 'Paxtachi tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703401, 'г. Андижан', 'Андижон ш.', 1703, 'Andijon sh.', 0, 15);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718401, 'г. Самарканд', 'Самарқанд ш.', 1718, 'Samarqand sh.', 0, 16);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718227, 'Пастдаргомский р-н', 'Пастдарғом тум.', 1718, 'Pastdarg`om tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714234, 'Учкурганский р-н', 'Учқўрғон тум.', 1714, 'Uchqo`rg`on tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718233, 'Самаркандский р-н', 'Самарқанд тум.', 1718, 'Samarqand tum.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724226, 'Сардобинский р-н', 'Сардоба тум.', 1724, 'Sardoba tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712230, 'Навбахорский р-н', 'Навбаҳор тум.', 1712, 'Navbahor tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712234, 'Карманинский р-н', 'Кармана тум.', 1712, 'Karmana tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712238, 'Нуратинский р-н', 'Нурота тум.', 1712, 'Nurota tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712248, 'Учкудукский р-н', 'Учқудуқ тум.', 1712, 'Uchquduq tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712251, 'Хатырчинский р-н', 'Хатирчи тум.', 1712, 'Xatirchi tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733223, 'Ханкинский р-н', 'Хонқа тум.', 1733, 'Xonqa tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714212, 'Наманганский р-н', 'Наманган тум.', 1714, 'Namangan tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726280, 'Алмазарский р-н', 'Олмазор тум.', 1726, 'Olmazor tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714216, 'Нарынский р-н', 'Норин тум.', 1714, 'Norin tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714219, 'Папский р-н', 'Поп тум.', 1714, 'Pop tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714224, 'Туракурганский р-н', 'Тўрақўрғон тум.', 1714, 'To`raqo`rg`on tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710405, 'г. Шахрисабз', 'Шаҳрисабз ш.', 1710, 'Shahrisabz sh.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714236, 'Чартакский р-н', 'Чортоқ тум.', 1714, 'Chortoq tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718215, 'Каттакурганский р-н', 'Каттақўрғон тум.', 1718, 'Kattaqo`rg`on tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722226, 'Шурчинский р-н', 'Шўрчи тум.', 1722, 'Sho`rchi tum.', 0, 14);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726273, 'Мирабадский р-н', 'Миробод тум.', 1726, 'Mirobod tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726266, 'Юнусабадский р-н ', 'Юнусобод тум.', 1726, 'Yunusobod tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733401, 'г. Ургенч', 'Урганч ш.', 1733, 'Urganch sh.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730224, 'Риштанский р-н', 'Риштон тум.', 1730, 'Rishton tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730215, 'Бешарыкский р-н', 'Бешариқ тум.', 1730, 'Beshariq tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730227, 'Ташлакский р-н', 'Тошлоқ тум.', 1730, 'Toshloq tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730206, 'Куштепинский р-н', 'Қўштепа тум.', 1730, 'Qo`shtepa tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735209, 'Бозатауский р-н', 'Бўзатов тум.', 1735, 'Bo''zatov tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735230, 'Тахтакупырский р-н', 'Тахтакўпир тум.', 1735, 'Taxtako`pir tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710224, 'Каршинский р-н', 'Қарши тум.', 1710, 'Qarshi tum.', 0, 13);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727265, 'Ташкентский р-н', 'Тошкент тум.', 1727, 'Toshkent tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735228, 'Тахиаташский р-н', 'Тахиатош тум.', 1735, 'Taxiatosh tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730408, 'г. Кувасай', 'Қувасой ш.', 1730, 'Quvasoy sh.', 0, 18);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710232, 'Китабский р-н', 'Китоб тум.', 1710, 'Kitob tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710229, 'Касанский р-н', 'Косон тум.', 1710, 'Koson tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710250, 'Яккабагский р-н', 'Яккабоғ тум.', 1710, 'Yakkabog` tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714401, 'г. Наманган', 'Наманган ш.', 1714, 'Namangan sh.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714237, 'Чустский р-н', 'Чуст тум.', 1714, 'Chust tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710233, 'Миришкорский р-н', 'Миришкор тум.', 1710, 'Mirishkor tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735233, 'Турткульский р-н', 'Тўрткўл тум.', 1735, 'To`rtko`l tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724231, 'Сырдарьинский р-н', 'Сирдарё тум.', 1724, 'Sirdaryo tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730203, 'Алтыарыкский р-н', 'Олтиариқ тум.', 1730, 'Oltiariq tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722221, 'Узунский р-н', 'Узун тум.', 1722, 'Uzun tum.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722223, 'Шерабадский р-н', 'Шеробод тум.', 1722, 'Sherobod tum.', 0, 13);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722220, 'Термезский р-н', 'Термиз тум.', 1722, 'Termiz tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718235, 'Нурабадский р-н', 'Нуробод тум.', 1718, 'Nurobod tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718236, 'Ургутский р-н', 'Ургут тум.', 1718, 'Urgut tum.', 0, 14);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718238, 'Тайлакский р-н', 'Тайлоқ тум.', 1718, 'Tayloq tum.', 0, 13);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722401, 'г. Термез', 'Термиз ш.', 1722, 'Termiz sh.', 0, 15);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722202, 'Ангорский р-н', 'Ангор тум.', 1722, 'Angor tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718218, 'Нарпайский р-н', 'Нарпай тум.', 1718, 'Narpay tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733217, 'Ургенчский р-н', 'Урганч тум.', 1733, 'Urganch tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726262, 'Учтепинский р-н', 'Учтепа тум.', 1726, 'Uchtepa tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718203, 'Акдарьинский р-н', 'Оқдарё тум.', 1718, 'Oqdaryo tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726287, 'Яккасарайский р-н', 'Яккасарой тум.', 1726, 'Yakkasaroy tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726269, 'М.Улугбекский р-н', 'М.Улуғбек тум.', 1726, 'M.Ulug`bek tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726290, 'Яшнабадский р-н', 'Яшнобод тум.', 1726, 'Yashnobod tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726294, 'Чиланзарский р-н', 'Чилонзор тум.', 1726, 'Chilonzor tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (9999001, 'Иностранное государство', 'Чет эл', 9999, 'Chet el', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (9999, 'Иностранное государство', 'Чет эл', null, 'Chet el', 0, 80);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735204, 'Амударьинский р-н', 'Амударё тум.', 1735, 'Amudaryo tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710235, 'Нишанский р-н', 'Нишон тум.', 1710, 'Nishon tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703230, 'Шахриханский р-н', 'Шаҳрихон тум.', 1703, 'Shahrixon tum.', 0, 18);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733, 'Хорезмская обл.', 'Хоразм вилояти', null, 'Xorazm viloyati', 0, 70);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722207, 'Музрабадский р-н', 'Музработ тум.', 1722, 'Muzrabot tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730233, 'Ферганский р-н', 'Фарғона тум.', 1730, 'Farg`ona tum.', 0, 13);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733230, 'Шаватский р-н', 'Шовот тум.', 1733, 'Shovot tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726277, 'Шайхантахурский р-н', 'Шайхонтоҳур тум.', 1726, 'Shayxontohur tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735236, 'Ходжейлийский р-н', 'Хўжайли тум.', 1735, 'Xo`jayli tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735240, 'Чимбайский р-н', 'Чимбой тум.', 1735, 'Chimboy tum.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703408, 'г. Ханабад', 'Хонобод ш.', 1703, 'Xonobod sh.', 0, 17);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735225, 'Нукусский р-н', 'Нукус тум.', 1735, 'Nukus tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730221, 'Учкуприкский р-н', 'Учкўприк тум.', 1730, 'Uchko`prik tum.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724235, 'Хавастский р-н', 'Ховос тум.', 1724, 'Xovos tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708204, 'Бахмальский р-н', 'Бахмал тум.', 1708, 'Baxmal tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724413, 'г. Янгиер', 'Янгиер ш.', 1724, 'Yangiyer sh.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727401, 'г. Нурафшан', 'Нурафшон ш.', 1727, 'Nurafshon sh.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727256, 'Чиназский р-н', 'Чиноз тум.', 1727, 'Chinoz tum.', 0, 13);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727249, 'Паркентский р-н', 'Паркент тум.', 1727, 'Parkent tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730401, 'г. Фергана', 'Фарғона ш.', 1730, 'Farg`ona sh.', 0, 20);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724216, 'Сайхунабадский р-н', 'Сайхунобод тум.', 1724, 'Sayxunobod tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727233, 'Куйичирчикский р-н', 'Қуйи Чирчиқ тум.', 1727, 'Quyi Chirchiq tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730238, 'Фуркатский р-н', 'Фурқат тум.', 1730, 'Furqat tum.', 0, 14);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710401, 'г. Карши', 'Қарши ш.', 1710, 'Qarshi sh.', 0, 15);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727248, 'Кибрайский р-н', 'Қибрай тум.', 1727, 'Qibray tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708212, 'Ш.Рашидовский р-н', 'Ш.Рашидов тум.', 1708, 'Sh.Rashidov tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712401, 'г. Навои', 'Навоий ш.', 1712, 'Navoiy sh.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722212, 'Джаркурганский р-н', 'Жарқўрғон тум.', 1722, 'Jarqo`rg`on tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722215, 'Кизирикский р-н', 'Қизириқ тум.', 1722, 'Qiziriq tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724410, 'г. Ширин', 'Ширин ш.', 1724, 'Shirin sh.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727404, 'г. Алмалык', 'Олмалиқ ш.', 1727, 'Olmaliq sh.', 0, 18);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733212, 'Кошкупырский р-н', 'Қўшкўпир тум.', 1733, 'Qo`shko`pir tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703236, 'Ходжаабадский р-н', 'Хўжаобод тум.', 1703, 'Xo`jaobod tum.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703202, 'Алтынкульский р-н', 'Олтинкўл тум.', 1703, 'Oltinko`l tum.', 0, 9);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714242, 'Янгикурганский р-н', 'Янгиқўрғон тум.', 1714, 'Yangiqo`rg`on tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706403, 'г. Каган', 'Когон ш.', 1706, 'Kogon sh.', 0, 14);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733406, 'г. Хива', 'Хива ш.', 1733, 'Xiva sh.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727259, 'Янгиюльский р-н', 'Янгийўл тум.', 1727, 'Yangiyo`l tum.', 0, 15);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727220, 'Бекабадский р-н', 'Бекобод тум.', 1727, 'Bekobod tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727237, 'Зангиатинский р-н', 'Зангиота тум.', 1727, 'Zangiota tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706212, 'Вабкентский р-н', 'Вобкент тум.', 1706, 'Vobkent tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706215, 'Гиждуванский р-н', 'Ғиждувон тум.', 1706, 'G`ijduvon tum.', 0, 11);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706246, 'Жондорский р-н', 'Жондор тум.', 1706, 'Jondor tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730209, 'Багдадский р-н', 'Боғдод тум.', 1730, 'Bog`dod tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712408, 'г. Зарафшан', 'Зарафшон ш.', 1712, 'Zarafshon sh.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712216, 'Кызылтепинский р-н', 'Қизилтепа тум.', 1712, 'Qiziltepa tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722204, 'Байсунский р-н', 'Бойсун тум.', 1722, 'Boysun tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730212, 'Бувайдинский р-н', 'Бувайда тум.', 1730, 'Buvayda tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730218, 'Кувинский р-н', 'Қува тум.', 1730, 'Quva tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1730242, 'Язъяванский р-н', 'Ёзёвон тум.', 1730, 'Yozyovon tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708401, 'г. Джизак', 'Жиззах ш.', 1708, 'Jizzax sh.', 0, 13);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733204, 'Багатский р-н', 'Боғот тум.', 1733, 'Bog`ot tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726264, 'Бектемирский р-н', 'Бектемир тум.', 1726, 'Bektemir tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735211, 'Караузякский р-н', 'Қораўзак тум.', 1735, 'Qorao`zak tum.', 0, 14);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703210, 'Булакбашинский р-н', 'Булоқбоши тум.', 1703, 'Buloqboshi tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735218, 'Канлыкульский р-н', 'Қонликўл тум.', 1735, 'Qanliko`l tum.', 0, 13);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703211, 'Джалакудукский р-н', 'Жалақудуқ тум.', 1703, 'Jalolquduq tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703209, 'Бостанский р-н', 'Бўстон тум.', 1703, 'Bo`ston tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722210, 'Денауский р-н', 'Денов тум.', 1722, 'Denov tum.', 0, 4);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708209, 'Галляаральский р-н', 'Ғаллаорол тум.', 1708, 'G`allaorol tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703214, 'Избасканский р-н', 'Избоскан тум.', 1703, 'Izboskan tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708215, 'Дустликский р-н', 'Дўстлик тум.', 1708, 'Do`stlik tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706401, 'г. Бухара', 'Бухоро ш.', 1706, 'Buxoro sh.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708220, 'Зарбдарский р-н', 'Зарбдор тум.', 1708, 'Zarbdor tum.', 0, 6);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727407, 'г. Ангрен', 'Ангрен ш.', 1727, 'Angren sh.', 0, 16);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727419, 'г. Чирчик', 'Чирчиқ ш.', 1727, 'Chirchiq sh.', 0, 20);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733208, 'Гурленский р-н', 'Гурлан тум.', 1733, 'Gurlan tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710, 'Кашкадарьинская обл.', 'Қашқадарё вилояти', null, 'Qashqadaryo viloyati', 0, 30);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727424, 'г. Янгиюль', 'Янгийўл ш.', 1727, 'Yangiyo`l sh.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706207, 'Бухарский р-н', 'Бухоро тум.', 1706, 'Buxoro tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714207, 'Касансайский р-н', 'Косонсой тум.', 1714, 'Kosonsoy tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708225, 'Зафарабадский р-н', 'Зафаробод тум.', 1708, 'Zafarobod tum.', 0, 7);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718, 'Самаркандская обл.', 'Самарқанд вилояти', null, 'Samarqand viloyati', 0, 45);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1735222, 'Муйнакский р-н', 'Мўйноқ тум.', 1735, 'Mo`ynoq tum.', 0, 5);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1703, 'Андижанская обл.', 'Андижон вилояти', null, 'Andijon viloyati', 0, 15);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1733236, 'Янгибазарский р-н', 'Янгибозор тум.', 1733, 'Yangibozor tum.', 0, 8);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727415, 'г. Ахангаран', 'Оҳангарон ш.', 1727, 'Ohangaron sh.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726, 'г. Ташкент', 'Тошкент ш.', null, 'Toshkent sh.', 0, 75);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710207, 'Гузарский р-н', 'Ғузор тум.', 1710, 'G`uzor tum.', 0, 14);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710240, 'Кукдалинский р-н', 'Кўкдала тум.', 1710, 'Ko‘kdala tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1706, 'Бухарская обл.', 'Бухоро вилояти', null, 'Buxoro viloyati', 0, 20);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710212, 'Дехканабадский р-н', 'Деҳқонобод т.', 1710, 'Dehqonobod t.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727224, 'Бостанлыкский р-н', 'Бўстонлиқ тум.', 1727, 'Bo`stonliq tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718406, 'г. Каттакурган', 'Каттақўрғон ш.', 1718, 'Kattaqo`rg`on sh.', 0, 15);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726283, 'Сергелийский р-н', 'Сергели тум.', 1726, 'Sergeli tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1726292, 'Янгихаётский р-н', 'Янгиҳаёт тум.', 1726, 'Yangihayot tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1710237, 'Касбинский р-н', 'Касби тум.', 1710, 'Kasbi tum.', 0, 3);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722, 'Сурхандарьинская обл.', 'Сурхондарё вилояти', null, 'Surxondaryo viloyati', 0, 50);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1722203, 'Бандихонский р-н', 'Бандихон тум.', 1722, 'Bandixon tum.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727239, 'Юкоричирчикский р-н', 'Юқори Чирчиқ тум.', 1727, 'Yuqori Chirchiq tum.', 0, 14);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1718209, 'Джамбайский р-н', 'Жомбой тум.', 1718, 'Jomboy tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712, 'Навоийская обл.', 'Навоий вилояти', null, 'Navoiy viloyati', 0, 35);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1712412, 'г.Газган', 'Ғозғон ш.', 1712, 'G''ozg''on sh.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724, 'Сырдарьинская обл.', 'Сирдарё вилояти', null, 'Sirdaryo viloyati', 0, 55);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724401, 'г. Гулистан', 'Гулистон ш.', 1724, 'Guliston sh.', 0, 10);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724212, 'Баяутский р-н', 'Боёвут тум.', 1724, 'Boyovut tum.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1724220, 'Гулистанский р-н', 'Гулистон тум.', 1724, 'Guliston tum.', 0, 2);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714, 'Наманганская обл.', 'Наманган вилояти', null, 'Namangan viloyati', 0, 40);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714401365, 'Давлатободский р-н', 'Давлатобод т.', 1714, 'Davlatobod t.', 0, 1);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1714401367, 'Янги Наманганский р-н', 'Янги Наманган т.', 1714, 'Yangi Namangan t.', 0, 500);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727, 'Ташкентская обл.', 'Тошкент вил.', null, 'Toshkent vil.', 0, 60);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727413, 'г. Бекабад', 'Бекобод ш.', 1727, 'Bekobod sh.', 0, 17);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1727253, 'Уртачирчикский р-н', 'Ўрта Чирчиқ тум.', 1727, 'O`rta Chirchiq tum.', 0, 12);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708, 'Джизакская обл.', 'Жиззах вилояти', null, 'Jizzax viloyati', 0, 25);");
         $this->execute("INSERT INTO public.enum_regions (id, title_ru, title_uz, parent_id, title_oz, is_deleted, \"order\") VALUES (1708218, 'Зааминский р-н', 'Зомин тум.', 1708, 'Zomin tum.', 0, 8);");

        $this->execute("ALTER TABLE public.enum_regions ADD PRIMARY KEY (id);");

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-enum_regions-parent_id}}',
            '{{%enum_regions}}',
            'parent_id'
        );

        // add foreign key for table `{{%enum_regions}}`
        $this->addForeignKey(
            '{{%fk-enum_regions-parent_id}}',
            '{{%enum_regions}}',
            'parent_id',
            '{{%enum_regions}}',
            'id',
            'RESTRICT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%enum_regions}}`
        $this->dropForeignKey(
            '{{%fk-enum_regions-parent_id}}',
            '{{%enum_regions}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-enum_regions-parent_id}}',
            '{{%enum_regions}}'
        );

        $this->dropTable('{{%enum_regions}}');
    }
}
