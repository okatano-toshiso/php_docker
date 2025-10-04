# 🐳 PHP Docker 環境構築ガイド

このリポジトリは、**PHP + Nginx + MySQL** のLAMP環境をDocker上で簡単に構築するための設定を提供します。  
ローカル開発環境を素早く立ち上げたい方に最適です。

---

## 📦 構成概要

| 種別 | 名前 | バージョン |
| :---: | :---: | :---: |
| 言語 | PHP | 8.2 |
| Webサーバ | Nginx | latest |
| データベース | MySQL | latest |

---

## 🚀 セットアップ手順

### 1. ビルド（初回のみ）
```bash
docker-compose build
```

### 2. コンテナ起動
```bash
docker-compose up -d
```
> `-d` オプションでバックグラウンド実行します。

### 3. コンテナ停止
```bash
docker-compose down
```

### 4. ステータス確認
```bash
docker-compose ps
```

---

## 🗂️ ディレクトリ構成

```
php_docker/
├── docker-compose.yml
├── nginx/
│   └── default.conf
├── php/
│   └── Dockerfile
└── www/
    └── index.php
```

---

## ⚙️ 環境変数（例）

`.env` ファイルを使用して環境変数を設定できます。

```env
MYSQL_ROOT_PASSWORD=root
MYSQL_DATABASE=app_db
MYSQL_USER=app_user
MYSQL_PASSWORD=secret
```

---

## 🧩 よく使うコマンド

| コマンド | 説明 |
| :--- | :--- |
| `docker-compose exec php bash` | PHPコンテナに入る |
| `docker-compose logs -f` | ログをリアルタイムで確認 |
| `docker system prune` | 不要なキャッシュを削除 |

---

## 🧠 トラブルシューティング

- **ポート競合エラー**  
  → 他のサービスが `80` や `3306` ポートを使用していないか確認してください。

- **MySQLが起動しない**  
  → `docker-compose logs db` でエラーログを確認してください。

---

## 📚 参考資料

- [GitHub Docs: 基本的な書き方とフォーマット](https://docs.github.com/ja/get-started/writing-on-github/getting-started-with-writing-and-formatting-on-github/basic-writing-and-formatting-syntax)
- [Qiita: READMEの書き方まとめ](https://qiita.com/dfalcon0001/items/843b93d90f21b9e99d50)
- [cpp-learning.com: READMEの作り方](https://cpp-learning.com/readme/)
- [Reddit: GitHub README Templates](https://www.reddit.com/r/programming/comments/l0mgcy/github_readme_templates_creating_a_good_readme_is/?tl=ja)

---

## 🏁 ライセンス

このプロジェクトはMITライセンスの下で公開されています。
