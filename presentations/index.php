<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fragments — Minimal PHP Framework</title>

    <style>
        :root {
            --bg: #0f1115;
            --fg: #e6e8eb;
            --muted: #9aa0a6;
            --accent: #6ee7b7;
            --border: #1f2933;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
                Roboto, Oxygen, Ubuntu, Cantarell, "Helvetica Neue", Arial;
            background: var(--bg);
            color: var(--fg);
            line-height: 1.6;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 4rem 1.5rem;
        }

        header {
            margin-bottom: 4rem;
        }

        .logo {
            font-size: 1.4rem;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .logo span {
            color: var(--accent);
        }

        h1 {
            font-size: 3rem;
            line-height: 1.2;
            margin: 1.5rem 0 1rem;
        }

        p.lead {
            font-size: 1.2rem;
            color: var(--muted);
            max-width: 600px;
        }

        section {
            margin-top: 4rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border);
        }

        h2 {
            font-size: 1.6rem;
            margin-bottom: 1rem;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 1.5rem 0;
        }

        li {
            margin-bottom: 0.75rem;
            color: var(--muted);
        }

        li::before {
            content: "— ";
            color: var(--accent);
        }

        pre {
            background: #0b0d10;
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 1.2rem;
            overflow-x: auto;
            font-size: 0.95rem;
        }

        footer {
            margin-top: 6rem;
            color: var(--muted);
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <div class="logo">Fragments<span>.</span></div>

            <h1>PHP, without the magic.</h1>
            <p class="lead">
                Fragments is a minimalist PHP framework focused on explicit execution,
                predictable performance, and zero hidden behavior.
            </p>
        </header>
        <section>
            <h2>Philosophy</h2>
            <ul>
                <li>Only load what you use</li>
                <li>No service container</li>
                <li>No reflection</li>
                <li>No global state</li>
                <li>Performance you can reason about</li>
            </ul>
        </section>

        <section>
            <h2>Example</h2>
            <pre><code>Route::get('/users', function ($req, Context $c) {
    return $c->db->query('SELECT * FROM users');
})
->uses(
    Fragment::database(),
    Fragment::http()
);</code></pre>
        </section>

        <section>
            <h2>Why Fragments?</h2>
            <ul>
                <li>Every dependency is explicit</li>
                <li>Fragments boot only when declared</li>
                <li>Context is per-request</li>
                <li>Code is readable in seconds</li>
            </ul>
        </section>

        <footer>
            <p>
                Built for engineers who care about clarity, not magic.
            </p>
            <p>
                © Fragments —
                <a href="https://github.com/aryantara/fragments.php" target="_blank" rel="noopener noreferrer"
                    style="color: var(--accent); text-decoration: none;">
                    github.com/aryantara/fragments.php
                </a>
            </p>
        </footer>

    </div>
</body>

</html>