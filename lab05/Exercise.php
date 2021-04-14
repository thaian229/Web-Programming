<?php
Class Page {

    private $page;
    private $title;
    private $year;
    private $copyright;

    private $header;
    private $footer;
    private $finalPage;

    public function __construct() {
        $this->page = "";
        $this->title = "";
        $this->year = "";
        $this->copyright = "";
    }

    public function setHeader($header) {
        $this->header = $header;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setCopyright($copyright) {
        $this->copyright = $copyright;
    }

    private function addHeader() {
        $this->header = "
                        <!DOCTYPE html>
                        <html lang='en'>
                        <head>
                            <meta charset='utf-8'>
                            <title>$this->title</title>
                            <link rel='stylesheet' href='style.css'>
                        </head>
                        <body><div class='container'><header> " . $this->header . " </header>";
    }

    public function addContent($partOfPage) {
        if(empty($this->page) || !isset($this->page)) {
            $this->page = $partOfPage;
        }
        else {
            $this->page .= "<br> " . $partOfPage;
        }
    }

    private function addFooter() {
        $this->footer .= "<BR><footer><p>&copy" . $this->year . " " . $this->copyright . " All Rights Reserved</p></footer></div></body>
    </html>";
    }

    public function get() {
        $this->addHeader();
        $this->addFooter();
        $this->finalPage = $this->header . $this->page .
            $this->footer;
        return $this->finalPage;
    }

    public function createHtml() {
        file_put_contents($this->title . ".html", $this->finalPage);
        header("Location: " . $this->title . ".html");

    }
}

if (isset($_POST['submit'])) $submit = $_POST['submit'];
else $submit = null;
if($submit) {
    $page = new Page();
    if (isset($_POST['title'])) $page->setTitle($_POST['title']);
    if (isset($_POST['year'])) $page->setYear($_POST['year']);
    if (isset($_POST['header'])) $page->setHeader($_POST['header']);
    if (isset($_POST['content'])) $page->addContent($_POST['content']);
    if (isset($_POST['copyright'])) $page->setCopyright($_POST['copyright']);
    $page->get();
    $page->createHtml();
}
?>

<html>
<h1 align="center">Page Generator</h1>
<form action="Exercise.php" method="post">
    <table>
        <tr>
            <td>
                Title:
            </td>
            <td>
                <input type="text" name="title"/>
            </td>
        </tr>
        <tr>
            <td>
                Year:
            </td>
            <td>
                <select name="year">
                    <?php
                    for($x= 2021; $x>= 1970; $x--) {
                        echo '<option value="' . $x . '">' . $x . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                Header:
            </td>
            <td>
                <textarea name="header"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Content:
            </td>
            <td>
                <textarea name="content"></textarea>
            </td>
        </tr>
        <tr>
            <td>
                Copyright:
            </td>
            <td>
                <input type="text" name="copyright"/>
            </td>
        </tr>
    </table>
    <input type="submit" name="submit" value="Submit">
</form>
</html>


