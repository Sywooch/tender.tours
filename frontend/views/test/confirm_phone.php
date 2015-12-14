<html> 
    <form method="post" action="/test/confirm">
        <input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken() ?>" />

        <table>
            <tr><td>Номер телефона<td><input name="phone" value="<?= $phone ?>">
            <tr><td><br/>

            <tr><td>Код подтверждения<td><input name="code" size="6">&nbsp;
                    <input type="submit" name="sendsms" value="Выслать код">
            <tr><td><br/>

            <tr><td><input type="submit" name="ok" value="Подтвердить">
        </table>

    </form>
</html>