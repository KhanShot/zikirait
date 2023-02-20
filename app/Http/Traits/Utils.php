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

    public static string $MESSAGE_SUCCESS = "Гуд джоб!";
    public static string $MESSAGE_SUCCESS_POST = "Операция выполнена удачно!";
    public static string $MESSAGE_USER_HAS_ADV = "У указанного партнера уже есть рекламная компания!";
    public static string $MESSAGE_USER_ROLE_WRONG = "У указанного пользователя роль не партнер!";
    public static string $MESSAGE_SUCCESS_ADDED = "Успешно добавлена в базу!";
    public static string $MESSAGE_SUCCESS_DELETED = "Запись успешно удалена из базы данных!";
    public static string $MESSAGE_SUCCESS_UPDATED = "Запись успешно обновлена!";

    public static string $MESSAGE_DATA_NOT_FOUND = "Запись не найдена в базе данных!";
    public static string $MESSAGE_SMS_NOT_SENT = "Не удалось отправить смс подтверждение!";

    public static string $MESSAGE_ALREADY_EXISTS = "Уже существует в Базе!";
    public static string $MESSAGE_DATA_HAS_BEEN_MODIFIED = "Данные обнавлены!";

    public static string $MESSAGE_UNEXPECTED_ERROR_OCCURRED = "Возник непредвиденная ошибка, прошу, попробуйте снова!";

}
