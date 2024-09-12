// Фотографии специалистов
import Ainetdinov from "../images/ainetdinov.png";
import Chermyaninova from "../images/chermyaninova.png";
import Esaulova from "../images/esaulova.png";
import Gavrilova from "../images/gavrilova.png";
import Ignatova from "../images/ignatova.png";
import Iliesku from "../images/iliesku.png";
import Ilina from "../images/ilina.png";
import Kaevicer from "../images/kaevicer.png";
import Kamilova from "../images/kamilova.png";
import Kozharina from "../images/kozharina.png";
import Kozhina from "../images/kozhina.png";
import Kuznetsova from "../images/kuznetsova.png";
import Melkumyan from "../images/melkumyan.png";
import Petrasova from "../images/petrasova.png";
import Popov from "../images/popov.png";
import Skupova from "../images/skupova.png";
import Solovieva from "../images/solovieva.png";
import Sverkunova from "../images/sverkunova.png";
import Tverdikova from "../images/tverdikova.png";
import Voznesenskaya from "../images/voznesenskaya.png";
import Yakovleva from "../images/yakovleva.png";

// Фотографии авторов
import Repenko from "../images/authors/repenko.png";
import Poslavskaya from "../images/authors/poslavskaya.png";
import Borisenkova from "../images/authors/borisenkova.png";

// Обложки для публикаций
// Репенко
import Cover_1 from "../images/covers/repenko/image_1.jpg";
import Cover_2 from "../images/covers/repenko/image_2.jpg";
import Cover_3 from "../images/covers/repenko/image_3.jpg";
import Cover_4 from "../images/covers/repenko/image_4.jpg";
import Cover_5 from "../images/covers/repenko/image_5.jpg";
// Пославская 
import Cover_6 from "../images/covers/poslavskaya/image_1.jpg";
import Cover_7 from "../images/covers/poslavskaya/image_2.jpg";
import Cover_8 from "../images/covers/poslavskaya/image_3.jpg";
// Борисенкова
import Cover_9 from "../images/covers/borisenkova/image_1.jpg";
import Cover_10 from "../images/covers/borisenkova/image_2.jpg";


export const SPECIALISTS = [
  {
    firstName: "Ангелина",
    secondName: "Яковлева",
    job: "Акушер-гинеколог, специалист по сексуальному здоровью «Клиники Фомина»",
    avatar: Yakovleva,
  },
  {
    firstName: "Надежда",
    secondName: "Петрасова",
    job: "Психолог-сексолог центра семейного образования Secrets",
    avatar: Petrasova,
  },
  {
    firstName: "Дмитрий",
    secondName: "Айнетдинов",
    job: "Врач высшей категории, акушер-гинеколог клиники «Скандинавия АВА-ПЕТЕР»",
    avatar: Ainetdinov,
  },
  {
    firstName: "Анастасия",
    secondName: "Скупова",
    job: "Клинический психолог, специалист центра Hungrie",
    avatar: Skupova,
  },
  {
    firstName: "Елена",
    secondName: "Соловьева",
    job: "Репродуктивный психолог, канд. психол. наук, психолог Центра репродукции «Линия Жизни», ст. науч. сотр. Центра прикладных психолого-педагогических исследований МГППУ, психолог Школы для Пап и Мам",
    avatar: Solovieva,
  },
  {
    firstName: "Анна",
    secondName: "Ильина",
    job: "Заведующая отделением ВРТ, врач-репродуктолог, врач-акушер-гинеколог Центра репродукции «Линия жизни»",
    avatar: Ilina,
  },
  {
    firstName: "Анастасия",
    secondName: "Есаулова",
    job: "Психолог, EMDR-терапевт и соавтор проекта «Пока не родила»",
    avatar: Esaulova,
  },
  {
    firstName: "Арика",
    secondName: "Мелкумян",
    job: "Сексолог, акушер-гинеколог, репродуктолог, науч. сотр. 1-ого гинекологического отделения НМИЦ акушерства, гинекологии и перинатологии им. В.И.Кулакова",
    avatar: Melkumyan,
  },
  {
    firstName: "Ирина",
    secondName: "Кожарина",
    job: "Гинеколог клиники DocMed",
    avatar: Kozharina,
  },
  {
    firstName: "Наталья",
    secondName: "Игнатова",
    job: "Медицинский психолог, специалист центра Hungrie",
    avatar: Ignatova,
  },
  {
    firstName: "Дарья",
    secondName: "Илиеску",
    job: "Врач гинеколог-репродуктолог, гинеколог-эндокринолог «Клиники Фомина»",
    avatar: Iliesku,
  },
  {
    firstName: "Мария",
    secondName: "Твердикова",
    job: "Акушер-гинеколог клиники «МЕДСИ»",
    avatar: Tverdikova,
  },
  {
    firstName: "Елена",
    secondName: "Кузнецова",
    job: "Акушер-гинеколог, репродуктолог, заведующая отделением ВРТ «Клиники Фомина»",
    avatar: Kuznetsova,
  },
  {
    firstName: "Ольга",
    secondName: "Чермянинова",
    job: "Репродуктолог клиники «Скандинавия АВА-ПЕТЕР»",
    avatar: Chermyaninova,
  },
  {
    firstName: "Георгий",
    secondName: "Каевицер",
    job: "Терапевт клиники DocMed",
    avatar: Kaevicer,
  },
  {
    firstName: "Роман",
    secondName: "Попов",
    job: "Репродуктолог клиники «Скандинавия АВА-Петер»",
    avatar: Popov,
  },
  {
    firstName: "Ирина",
    secondName: "Гаврилова",
    job: "Репродуктолог клиники DocMed",
    avatar: Gavrilova,
  },
  {
    firstName: "Наталья",
    secondName: "Сверкунова",
    job: "Старший эмбриолог клиники «Скандинавия АВА-ПЕТЕР»",
    avatar: Sverkunova,
  },
  {
    firstName: "Яна",
    secondName: "Кожина",
    job: "Репродуктолог клиники «Скандинавия АВА-ПЕТЕР»",
    avatar: Kozhina,
  },
  {
    firstName: "Юлия",
    secondName: "Вознесенская",
    job: "Репродуктолог, акушер-гинеколог и руководитель Клиники репродуктивной и пренатальной медицины ЕМС",
    avatar: Voznesenskaya,
  },
  {
    firstName: "Дилором",
    secondName: "Камилова",
    job: "Репродуктолог, главный врач женского центра клиники «Мать и дитя» Кунцево",
    avatar: Kamilova,
  },
];

export const AUTHORS = [
  {
    name: "Ника Репенко",
    job: "Журналист",
    education:
      "Закончила бакалавриат РУДН и магистратуру Карлова университета в Праге.",
    quote:
      "«Я очень любознательный человек. Мне всегда интересно разобраться, как устроены вещи, поэтому я люблю читать и писать про науку, психологию и медицину. А еще мне важно, чтобы моя работа приносила пользу. Reya — как раз то место, где можно не только работать с интересными темами, но и делиться важной и полезной информацией с читателями».",
    photo: Repenko,
    publications: [
      {
        title:
          "«Дети – это всегда счастье, неважно, каким образом они появились»",
        link: "https://reya.media/deti-eto-vsegda-schaste-nevazhno-kakim-sposobom-oni-poyavilis",
        image: Cover_1,
        type: "интервью",
        description:
          "Как три подруги из Москвы основали проект «Планируем вместе» и учат женщин не бояться бесплодия",
      },
      {
        title: "Доказано: физкультура может заменить антидепрессанты",
        link: "https://reya.media/dokazano-zanyatiya-sportom-rabotayut-ne-huzhe-antidepressantov",
        image: Cover_2,
        type: "интервью",
        description: "Делимся любопытным открытием британских ученых",
      },
      {
        title: "Иглоукалывание: научный метод или плацебо",
        link: "https://reya.media/zachem-muzhchiny-stanovyatsya-donorami-spermy",
        image: Cover_3,
        type: "интервью",
        description: "Как стать донором и сколько за это платят",
      },
      {
        title: "Зачем мужчины становятся донорами спермы?",
        link: "https://reya.media/igloukalyvanie-pri-beremennosti-est-li-protivopokazaniya",
        image: Cover_4,
        type: "интервью",
        description: "И можно ли применять акупунктуру при беременности",
      },
      {
        title: "Что такое EMDR-терапия в психологии",
        link: "https://reya.media/chto-takoe-emdr-terapiya-v-psihologii",
        image: Cover_5,
        type: "интервью",
        description:
          "И почему ее считают лучшим способом преодолеть травмирующий жизненный опыт",
      },
    ],
  },
  {
    name: "Юлия Пославская (псевдоним Маргарита Леммель)",
    job: "Журналист",
    education:
      "Образование: Национальный исследовательский университет «Высшая школа экономики» (НИУ ВШЭ), специализация «журналистика».",
    quote:
      "Для меня медицинская журналистика и работа в Reya – это возможность узнать больше о женском организме и поделиться этими знаниями с другими девушками. В первую очередь я пишу на темы, связанные с фертильностью и патологиями, однако этим круг интересов не ограничивается.",
    photo: Poslavskaya,
    publications: [
      {
        title: "Женская гиперсексуальность: когда секс превращается в охоту",
        link: "https://reya.media/zhenskaya-giperseksualnost-kogda-seks-prevrashhaetsya-v-ohotu",
        image: Cover_6,
        type: "интервью",
        description:
          "Как три подруги из Москвы основали проект «Планируем вместе» и учат женщин не бояться бесплодия",
      },
      {
        title: "Весенний авитаминоз: правда или миф?",
        link: "https://reya.media/vesennij-avitaminoz-pravda-ili-mif",
        image: Cover_7,
        type: "интервью",
        description:
          "Как три подруги из Москвы основали проект «Планируем вместе» и учат женщин не бояться бесплодия",
      },
      {
        title: "Почему менструация идет несколько раз в месяц",
        link: "https://reya.media/pochemu-menstruacziya-idet-neskolko-raz-v-mesyacz",
        image: Cover_8,
        type: "интервью",
        description:
          "Как три подруги из Москвы основали проект «Планируем вместе» и учат женщин не бояться бесплодия",
      },
    ],
  },
  {
    name: "Екатерина Борисенкова",
    job: "Журналист",
    education: "Самарский государственный университет, факультет журналистики.",
    quote:
      "«Медицинская журналистика и работа в Reya для меня стала возможностью разобраться во вроде бы простых, но максимально важных в повседневной жизни темах. А писать о том, что тебе интересно и касается лично тебя, всегда гораздо увлекательнее»",
    photo: Borisenkova,
    publications: [
      {
        title: "Что такое диета карнивор простыми словами",
        link: "https://reya.media/chto-takoe-dieta-karnivor-prostymi-slovami",
        image: Cover_9,
        type: "интервью",
        description:
          "Как три подруги из Москвы основали проект «Планируем вместе» и учат женщин не бояться бесплодия",
      },
      {
        title:
          "Пищевая зависимость: какое отношение к еде считается нездоровым",
        link: "https://reya.media/pishhevaya-zavisimost-kakoe-otnoshenie-k-ede-schitaetsya-nezdorovym",
        image: Cover_10,
        type: "интервью",
        description:
          "Как три подруги из Москвы основали проект «Планируем вместе» и учат женщин не бояться бесплодия",
      },
    ],
  },
];
