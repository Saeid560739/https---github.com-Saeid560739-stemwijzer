<?php
/**
 * home controller
 */
class LandingPage extends Controller
{
    function index()
    {
        $statement = new Statement();
        $statements = $statement->findAll();

        $this->view('landingpage', [
            'data' => $statements
        ]);
    }

    function startStemwijzer($statementId)
    {
        // Redirect to the home.view.php page with the specified statement ID
        header("Location: " . ROOT . "/home/" . $statementId);
        exit;
    }
}
