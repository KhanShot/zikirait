<?php

namespace App\Http\Traits;

class Utils
{
    public static int $SUCCESS_CODE = 200;
    public static string $STATUS_CODE_LOGIN_INCORRECT = "incorrect_user_data";
    public static string $STATUS_CODE_EMAIL_NOT_VERIFIED = "email_not_verified";
    public static string $STATUS_CODE_HAS_INCORRECT_FIELDS = "has_incorrect_fields";
    public static string $STATUS_CODE_NOT_FOUND = "data_not_found";
    public static string $STATUS_CODE_PROFILE_NOT_COMPLETED = "profile_not_completed";
    public static string $STATUS_CODE_UNEXPECTED_ERROR = "unexpected_error";
    public static string $STATUS_CODE_ALREADY_EXISTS = "data_already_exists";

    public static string $STATUS_MODERATION_DIRTY = 'DIRTY';
    public static string $STATUS_MODERATION_VISIBLE_DEFECTS = 'VISIBLE_DEFECTS';
    public static string $STATUS_MODERATION_CAMPAIGN_FULL = 'CAMPAIGN_FULL';
    public static string $STATUS_MODERATION_OTHER = 'OTHER';

    public static function status_moderation_reason_string():array{
        return array(
            'DIRTY' => 'Спасибо за проявленный интерес к рекламной кампании, но Твой автомобиль слишком грязный. Пожалуйста помой свой автомобиль и подай заявку на участие еще раз. Мы тебя ждем.',
            'VISIBLE_DEFECTS' => 'Спасибо за проявленный интерес к рекламной кампании, но к сожалению,
            Твой автомобиль не прошел проверку, по причине внешних повреждений кузова. Ты можешь подать заявку на участие после того, как устранишь повреждения. Будем тебя ждать.',
            'CAMPAIGN_FULL' => 'Нет мест в рекламной кампании',
            'NOT_SHOW_UP' => 'Не явился',
            'OTHER' => 'Другая причина',
        );
    }
    public static function status_moderation_reason():array{
        return array(
            'DIRTY',
            'VISIBLE_DEFECTS',
            'CAMPAIGN_FULL',
            'NOT_SHOW_UP',
            'OTHER',
        );
    }

    public static string $ACCEPTED_PRIORITY_HIGH = 'HIGH';
    public static string $ACCEPTED_PRIORITY_LOW = 'LOW';

    public static string $STATUS_ACCEPTED = 'ACCEPTED';
    public static string $STATUS_DENIED = 'DENIED';
    public static string $STATUS_DRAFT = 'DRAFT';
    public static string $STATUS_FINISHED = 'FINISHED';
    public static string $STATUS_ACTIVE = 'ACTIVE';
    public static string $STATUS_PENDING = 'PENDING';
    public static string $STATUS_PENDING_USER = 'PENDING_USER';
    public static string $DATE_FORMAT = 'Y-m-d';
    public static string $DATE_FORMAT_HOURS = 'Y-m-d H:i:s';


    public static string $MESSAGE_AUTHENTICATED = "Выполнена авторизация!";
    public static string $MESSAGE_ENROLL_MODERATION = "Ваша заявка отправлено на рассмотрение!";
    public static string $MESSAGE_PASTING_NOT_ENROLLED = "Вы пока не можете участвовать в оклейке!";
    public static string $MESSAGE_MODERATION_ALREADY_SENT = "Вы уже отправили заявку на модерацию!";
    public static string $MESSAGE_MODERATION_STATUS_ALREADY_CHANGED = "Вы уже изменили статус модерации!";
    public static string $MESSAGE_MODERATION_STATUS_CAN_NOT_BE_CHANGED = "Вы пока не можете изменить статус модерации!";
    public static string $MESSAGE_PASTING_STATUS_CAN_NOT_BE_CHANGED = "Вы пока не можете изменить статус оклейки!";
    public static string $MESSAGE_ENROLL_MODERATION_FAIL = "Вы уже отправили заявку на участие!";
    public static string $MESSAGE_NOT_ALLOWED = "Для данного пользователя доступ запрещен!";
    public static string $MESSAGE_DRIVER_CAR_NEEDED = "Машина не добавлена!";
    public static string $MESSAGE_HAS_VALIDATION_ERRORS = "Вы ввели неправильные поля!";
    public static string $MESSAGE_LOGIN_INCORRECT = "Неверный логин или пароль!";
    public static string $MESSAGE_VERIFY_PHONE = "Пожалуйста, подтвердите номер";
    public static string $MESSAGE_VERIFY_PHONE_SEND = "Код для подтверждение номера, отправлано на ваш номер!";
    public static string $MESSAGE_WRONG_SMS_CODE = "Вы ввели неправильный код!";
    public static string $MESSAGE_PHONE_VERIFIED_ALREADY = "Ваш номер уже подтвержден, попробуйте войти!";
    public static string $MESSAGE_PHONE_VERIFIED = "Ваш номер успешно подтвержден!";
    public static string $MESSAGE_EMAIL_NOT_FOUND = "Указанная почта не найдена в нашем базе данных!";
    public static string $MESSAGE_USER_PROFILE_UPDATED = "Ваша профиль обновлена!";


    public static string $MESSAGE_COURSE_UPLOADED_SUCCESS = "Гуд джоб!";
    public static string $MESSAGE_SUCCESS_POST = "Операция выполнена удачно!";
    public static string $MESSAGE_USER_HAS_ADV = "У указанного партнера уже есть рекламная компания!";
    public static string $MESSAGE_USER_ROLE_WRONG = "У указанного пользователя роль не партнер!";
    public static string $MESSAGE_SUCCESS_ADDED = "Успешно добавлена в базу!";
    public static string $MESSAGE_SUCCESS_DELETED = "Запись успешно удалена из базы данных!";
    public static string $MESSAGE_SUCCESS_UPDATED = "Запись успешно обновлена!";
    public static string $MESSAGE_CAMPAIGN_NOT_UPDATED = "Статус компании не позволяет обновить его!";
    public static string $MESSAGE_CAMPAIGN_HAS_STARTED = "Рекламная кампания началась!";
    public static string $MESSAGE_CAMPAIGN_CAR_NOT_ENOUGH = "У вас нет машин для запуска кампании";
    public static string $MESSAGE_CAMPAIGN_START_DATE_NOT_ENOUGH = "Дата начала должна быть с запасом хотя бы 2 дня!";
    public static string $MESSAGE_CAMPAIGN_BALANCE_NOT_ENOUGH = "Недостаточно средств для запуска рекламной кампании!";
    public static string $MESSAGE_CAMPAIGN_STATUS_NOT_ALLOWED_TO_START = "Статус компании не позволяет начать кампанию!";
    public static string $MESSAGE_CAMPAIGN_ALREADY_STARTED = "Кампания уже начато!";
    public static string $MESSAGE_DATA_NOT_FOUND = "Запись не найдена в базе данных!";
    public static string $MESSAGE_SMS_NOT_SENT = "Не удалось отправить смс подтверждение!";

    public static string $MESSAGE_ALREADY_EXISTS = "Уже существует в Базе!";
    public static string $MESSAGE_DATA_HAS_BEEN_MODIFIED = "Данные обнавлены!";
    public static string $MESSAGE_DRIVER_HAVE_NOT_CAMPAIGN = "У водителя нет активных кампании!";

    public static string $MESSAGE_UNEXPECTED_ERROR_OCCURRED = "Возник непредвиденная ошибка, прошу, попробуйте снова!";

    //-----------------------------------------moderation------------------------------------------------

    public static string $MODERATION_PRE_STRING = 'Премодерация';
    public static string $MODERATION_START_STRING = 'Начало';
    public static string $MODERATION_END_STRING = 'Конец';
    public static string $MODERATION_WASH_STRING = 'Мойка';
    public static string $MODERATION_PASTING_STRING = 'Оклейка';
    public static string $MODERATION_PAY_STRING = 'Выплата';
    public static string $MODERATION_MANUAL_STRING = 'Админстратор';


    public static string $MODERATION_PRE = 'PRE';
    public static string $MODERATION_START = 'START';
    public static string $MODERATION_END = 'END';
    public static string $MODERATION_WASH = 'WASH';
    public static string $MODERATION_PASTING = 'PASTING';
    public static string $MODERATION_UNPASTING = 'UNPASTING';
    public static string $MODERATION_PAY = 'PAYMENT';
    public static string $MODERATION_MANUAL = 'ADMIN';


    public static int $ROLE_DRIVER = 3;

    public static float $bank_percentage = 1.10;
    public static float $dismantling_cost = 2000.0;
    public static float $wash_cost = 500.0;
    public static int $wash_interval_day = 14;

    public static function moderation_types():array{
        return array(
            'PRE', 'START','END','WASH',
            'PASTING','PAYMENT','ADMIN',
        );
    }

    public static function moderation_types_string():array{
        return array(
            'PRE' => 'Премодерация', 'START' => 'Начало','END' => 'Конец','WASH' => 'Мойка',
            'PASTING' => 'Оклейка','PAYMENT'=> 'Выплата','ADMIN' => 'Админстратор',
        );
    }
}
