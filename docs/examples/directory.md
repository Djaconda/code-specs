# Directory expectations

In the following example we check that given directory exists and is readable.

```php
/**
 * @test
 */
public function directoryExampleSpec() {
        $I = $this->tester;
        $I->describe('process of testing directories');
        $I->expectThat('given directory is accessible');
        $I->seeThatDirectory(__DIR__)
            ->isExist()
            ->isReadable();
}
```