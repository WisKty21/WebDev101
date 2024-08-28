# JSでリクエスト送信・PHPでレスポンス
リンクをクリックしたりフォームの送信ボタンを押すとサーバーへリクエストすることができますが、  
JavaScriptからでもサーバーへリクエストすることができます。

<!-- TOC -->

- [送信するデータを作成](#%E9%80%81%E4%BF%A1%E3%81%99%E3%82%8B%E3%83%87%E3%83%BC%E3%82%BF%E3%82%92%E4%BD%9C%E6%88%90)
- [リクエストを実行](#%E3%83%AA%E3%82%AF%E3%82%A8%E3%82%B9%E3%83%88%E3%82%92%E5%AE%9F%E8%A1%8C)
- [PHP側でJavaScript用のレスポンスを作る](#php%E5%81%B4%E3%81%A7javascript%E7%94%A8%E3%81%AE%E3%83%AC%E3%82%B9%E3%83%9D%E3%83%B3%E3%82%B9%E3%82%92%E4%BD%9C%E3%82%8B)
- [レスポンスを受け取る](#%E3%83%AC%E3%82%B9%E3%83%9D%E3%83%B3%E3%82%B9%E3%82%92%E5%8F%97%E3%81%91%E5%8F%96%E3%82%8B)

<!-- /TOC -->

## 送信するデータを作成
HTMLで`<form>`や`<input>`を利用してPOSTメソッドで送信するデータを指定できるように、  
JavaScript上でもフォーム情報を取り扱うことができます。

```js
// フォームデータの入れ物を作る
const formData = new FormData();

// 送信したい値を追加
formData.append('id', questionId);
formData.append('selectedAnswer', selectedAnswer);
```

## リクエストを実行
リクエストを送信するためには、`XMLHttpRequest`というものを利用します。  
以下のように書くとJavaScript上でリクエストが送信されます。

```js
// xhr = XMLHttpRequestの頭文字です
const xhr = new XMLHttpRequest();

// HTTPメソッドをPOSTに指定、送信するURLを指定
xhr.open('POST', 'answer.php');

// フォームデータを送信
xhr.send(formData);
```

## PHP側でJavaScript用のレスポンスを作る
JavaScriptからリクエストが届いた後、PHP側でリクエスト情報を受け取り、処理を行います。  
その後レスポンスを返すことになりますが、JavaScriptではHTMLをそのまま返しても処理することができません。  
JavaScriptの場合、JSON(JavaScript Object Notation)という文字列のフォーマットをレスポンスにしてあげることでJavaScript側でJSONを解析してオブジェクトとして利用することができます。

PHPでは、配列・連想配列をJSONに変換する関数`json_encode`を使うことでかんたんにJSONを生成できます。

```php
$response = [
    'result' => true,
    'correctAnswer' => 'A',
    'correctAnswerValue' => '1万円',
    'explanation' => '渋沢栄一の1人のファンとして考えると、新しい日本銀行券（一万円札）が新たなファングッズの一つになります（？）',
];

echo json_encode($response);
```

実行結果
```
{"result":true,"correctAnswer":"A","correctAnswerValue":"1\u4e07\u5186","explanation":"\u6e0b\u6ca2\u6804\u4e00\u306e1\u4eba\u306e\u30d5\u30a1\u30f3\u3068\u3057\u3066\u8003\u3048\u308b\u3068\u3001\u65b0\u3057\u3044\u65e5\u672c\u9280\u884c\u5238\uff08\u4e00\u4e07\u5186\u672d\uff09\u304c\u65b0\u305f\u306a\u30d5\u30a1\u30f3\u30b0\u30c3\u30ba\u306e\u4e00\u3064\u306b\u306a\u308a\u307e\u3059\uff08\uff1f\uff09"}
```
※日本語はUNICODEに変換されます  
※UNICODEというのは文字コードの一つで文字の表現方法のひとつです。バグではありません。  
※JavaScript側はUNICODEを処理できるのでPHP側は上記のままで問題ありません。

日本語で見たい場合は以下を実行するとUNICODEにならずに出力されます
```php
echo json_encode($response, JSON_UNESCAPED_UNICODE);
```
実行結果
```
{"result":true,"correctAnswer":"A","correctAnswerValue":"1万円","explanation":"渋沢栄一の1人のファンとして考えると、新しい日本銀行券（一万円札）が新たなファングッズの一つになります （？）"}
```


## レスポンスを受け取る
PHPからレスポンスを受け取った後は、レスポンスの内容に応じて処理を行うことができます。

まずは、レスポンスのHTTP status codeを見て、通信自体が成功したことを確認します。  
その後に、PHPから渡されたJSONの内容を元に実施したいJavaScriptの処理を実行できるよう実装します。

以下は、実装例です。

```js
// loadendはリクエストが完了したときにイベントが発生する
xhr.addEventListener('loadend', receivedResponse);

function receivedResponse(event) {
    // addEventListenerによってイベント検知した対象(XMLHttpRequest)のオブジェクトを取得
    const xhr = event.currentTarget;

    // http status code を確認
    if (xhr.status === 200) {
        // 正常な処理

        // サーバーからのレスポンスがJSONの文字ならJSON.parseでJavaScriptのオブジェクトに変換
        const response = JSON.parse(xhr.response);

        // responseの内容を見ながら処理を行う
    } else {
        // エラーなど
    }
}
```

- [HTTP レスポンスステータスコード - HTTP | MDN](https://developer.mozilla.org/ja/docs/Web/HTTP/Status)