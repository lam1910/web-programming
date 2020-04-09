<?php


class Page
{
    private string $page;
    private string $title;
    private string $year;
    private string $copyright;

    public function __construct($title, $year, $copyright)
    {
        $this->title = $title;
        $this->year = $year;
        $this->copyright = $copyright;
    }

    private function addHeader()
    {
    }

    public function addContent($in_content)
    {
        $this->page = $in_content;
    }

    private function addFooter()
    {
    }

    public function get()
    {
        return '
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>' . $this->title . '</title>
            </head>
            <body>
            <div style="text-align: center;"><h3>' . $this->page . '</h3></div>
            </body>
            <hr>
            <footer>
            Copyright &copy ' . $this->year . ' by ' . $this->copyright . '
            </footer>
            </html>
        ';
    }
}
