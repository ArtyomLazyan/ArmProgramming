<?php

class Article
{
    const SHOW_BY_DEFAULT = 6;

    /**
     * return array latest Articles
     */
    public static function getLatestArticles($limit = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();

        $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT :limit";
        $result = $db->prepare($sql);
        $result->bindParam(":limit", $limit, PDO::PARAM_INT);
        $result->execute();
        $latestArticles = $result->fetchAll();

        return $latestArticles;
    }

    public static function getArticlesListByCategory($categoryId, $limit = self::SHOW_BY_DEFAULT, $page = 1)
    {
        // Смещение (для запроса)
        $offset = ($page - 1) * $limit;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT * FROM articles WHERE category_id = :category_id ORDER BY id DESC LIMIT :limit OFFSET :offset";

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();
        $articlesByCategory = $result->fetchAll();

        // if articles exists then return else 404 page
        if ($articlesByCategory) {
            return $articlesByCategory;
        } else {
            header("Location: /404");
            return false;
        }
    }

    public static function getArticlesList($page = 1, $limit = self::SHOW_BY_DEFAULT)
    {
        // Смещение (для запроса)
        $offset = ($page - 1) * $limit;

        if ($offset < 0) {
            header("Location: /404");
            return false;
        }

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "SELECT * FROM articles ORDER BY id DESC LIMIT :limit OFFSET :offset";

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение коменды
        $result->execute();
        $articlesList = $result->fetchAll();

        // if articles exists then return else 404 page
        if ($articlesList) {
            return $articlesList;
        } else {

            header("Location: /404");
            return false;
        }
    }

    public static function getTotalArticlesInCategory($categoryId = 0)
    {
        $db = Db::getConnection();

        $sql = "SELECT count(id) AS count FROM articles WHERE category_id = :category_id";
        $result = $db->prepare($sql);
        $result->bindParam(":category_id", $categoryId, PDO::PARAM_INT);
        $result->execute();

        $row = $result->fetch();
        return $row["count"];
    }

    public static function getTotalArticles()
    {
        $db = Db::getConnection();

        $sql = "SELECT count(id) AS count FROM articles";
        $result = $db->prepare($sql);
        $result->execute();

        $row = $result->fetch();
        return $row["count"];
    }

    public static function getArticleById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM articles WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение коменды
        $result->execute();
        $article = $result->fetch();

        // if article exists then return else 404 page
        if ($article) {
            return $article;
        }


    }

    public static function topReadableArticles($limit = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM articles ORDER BY views DESC LIMIT :limit";
        $result = $db->prepare($sql);
        $result->bindParam(":limit", $limit, PDO::PARAM_INT);
        $result->execute();
        $topReadableArticles = $result->fetchAll();

        return $topReadableArticles;
    }

    public static function topRatesArticles($limit = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM articles ORDER BY rate DESC LIMIT :limit";
        $result = $db->prepare($sql);
        $result->bindParam(":limit", $limit, PDO::PARAM_INT);
        $result->execute();
        $topRatesArticles = $result->fetchAll();

        return $topRatesArticles;
    }

    public static function getCommentsByArticleId($articleId, $limit = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM comments WHERE articles_id = :articleId ORDER BY id DESC LIMIT :limit";
        $result = $db->prepare($sql);
        $result->bindParam(":articleId", $articleId, PDO::PARAM_INT);
        $result->bindParam(":limit", $limit, PDO::PARAM_INT);
        $result->execute();
        $comments = $result->fetchAll();

        return $comments;
    }

    public static function getLatestComments($limit = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();
        $sql = "SELECT * FROM comments ORDER BY id DESC LIMIT :limit";
        $result = $db->prepare($sql);
        $result->bindParam(":limit", $limit, PDO::PARAM_INT);
        $result->execute();
        $comments = $result->fetchAll();

        return $comments;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteArticleById($id)
    {

        $image_name = Article::getImage($id);
        unlink($_SERVER['DOCUMENT_ROOT'] . "/" . $image_name);

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM articles WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }


    /**
     * Добавляет новый товар
     * @param array $options <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createArticle($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "INSERT INTO articles (title, text, video_iframe, category_id, visibility) VALUES (:title, :text, :video_iframe, :category_id, :visibility)";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':text', $options['text'], PDO::PARAM_STR);
        $result->bindParam(':video_iframe', $options['video_iframe'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':visibility', $options['visibility'], PDO::PARAM_STR);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }

    public static function updateArticleById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE articles SET title = :title, text = :text, video_iframe = :video_iframe, category_id = :category_id, visibility = :visibility WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':text', $options['text'], PDO::PARAM_STR);
        $result->bindParam(':video_iframe', $options['video_iframe'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':visibility', $options['visibility'], PDO::PARAM_STR);


        return $result->execute();
    }

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($id)
    {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/upload/post_images/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'] . $pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public static function viewsIncrement($article_id)
    {
        $db = Db::getConnection();

        $sql = "UPDATE articles SET views = views + 1 WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(":id", $article_id, PDO::PARAM_INT);

        return $result->execute();

    }


}
