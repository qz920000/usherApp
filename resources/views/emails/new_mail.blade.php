<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>new mail</h2>

        <div>
            Hello {{$receivername}}<br/>
            Congratulations!!!.It seems someone is interested in you.<br/>
            You have received mail from {{$sendername}}.<br/>
            Please log in to the website to check your mail. <br/>
            <a href={{ URL::to('/login') }}>{{ URL::to('/login') }}</a>
            
            
            <p>Admin</p>
        </div>

    </body>
</html>