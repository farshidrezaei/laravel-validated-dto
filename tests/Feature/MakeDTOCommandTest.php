<?php

it('generates a new ValidatedDTO class via command', function () {
    $dtoClass = app_path('DTOs/UserDTO.php');

    if (file_exists($dtoClass)) {
        unlink($dtoClass);
    }

    $this->artisan('make:dto', ['name' => 'UserDTO'])
        ->assertExitCode(0);

    expect($dtoClass)->toBeFileWithContent(UserDTO());
});

/**
 * Content of the expected UserDTO class
 */
function UserDTO(): string
{
    return <<<CLASS
<?php

namespace App\DTOs;

use WendellAdriel\ValidatedDTO\ValidatedDTO;

class UserDTO extends ValidatedDTO
{
    /**
     * Defines the validation rules for the DTO.
     *
     * @return array
     */
    protected function rules(): array
    {
        return [];
    }

    /**
     * Defines the default values for the properties of the DTO.
     *
     * @return array
     */
    protected function defaults(): array
    {
        return [];
    }

    /**
     * Defines the type casting for the properties of the DTO.
     *
     * @return array
     */
    protected function casts(): array
    {
        return [];
    }

    /**
     * Defines the custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [];
    }

    /**
     * Defines the custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [];
    }
}

CLASS;
}
