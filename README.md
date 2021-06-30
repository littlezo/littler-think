# ThinkPHP6 Quick Skeleton

===============

> 运行环境要求 PHP8.0+ 向下兼容 PHP7.4。

### 创建项目

```sh
composer create-project littler/think-skeleton
```

### 安装

```sh
composer i
```

### 启动

```sh
composer start
```

### 格式化代码

```sh
composer cs-fix path
```

### 代码静态分析

```sh
composer analyze
```

## Commit message 的格式

### type(scope) : subject

- type（必须） : commit 的类别，只允许使用下面几个标识：

> feat : 新功能
>
> fix : 修复 bug
>
> docs : 文档改变
>
> style : 代码格式改变
>
> refactor : 某个已有功能重构
>
> perf : 性能优化
>
> test : 增加测试
>
> build : 改变了 build 工具 如 grunt 换成了 npm
>
> revert : 撤销上一次的 commit
>
> chore : 构建过程或辅助工具的变动
>
> remove : 移除文件或功能

- scope（可选） : 用于说明 commit 影响的范围，比如数据层、控制层、视图层等等，视项目不同而不同。

- subject（必须） : commit 的简短描述，不超过 50 个字符。

- commitizen 是一个撰写合格 Commit message 的工具，

## 版权信息

更多细节参阅 [MPL V2](LICENSE)
