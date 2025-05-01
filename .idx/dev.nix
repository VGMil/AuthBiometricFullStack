# To learn more about how to use Nix to configure your environment
# see: https://firebase.google.com/docs/studio/customize-workspace
{ pkgs, ... }: {
  # Which nixpkgs channel to use.
  channel = "stable-24.05"; # or "unstable"
  packages = [
    
    pkgs.nodejs_20
    pkgs.php83
    pkgs.php83Packages.composer
    pkgs.docker
    pkgs.docker-compose
    
  ];
  # Sets environment variables in the workspace
  env = {};
  services.docker.enable = true;
  idx = {
    # Search for the extensions you want on https://open-vsx.org/ and use "publisher.id"
    extensions = [
      # "vscodevim.vim"
      "shufo.vscode-blade-formatter"
      "onecentlin.laravel-blade"
      "codingyu.laravel-goto-view"
      "onecentlin.laravel5-snippets"
      "bmewburn.vscode-intelephense-client"
      "bradlc.vscode-tailwindcss"
      "vscode-icons-team.vscode-icons"
      "laravel.vscode-laravel"
      "dsznajder.es7-react-js-snippets"
      "formulahendry.auto-rename-tag"
    ];
    # Enable previews
    previews = {
      enable = true;
      previews = {

      };
    };
    # Workspace lifecycle hooks
    workspace = {
      # Runs when a workspace is first created
      onCreate = {
        # Example: install JS dependencies from NPM
        # npm-install = "npm install";
        # Open editors for the following files by default, if they exist:
        default.openFiles = [ ".idx/dev.nix" "README.md" ];
      };
      # Runs when the workspace is (re)started
      onStart = {
        # Example: start a background task to watch and re-build backend code
        # watch-backend = "npm run watch-backend";
      };
    };
  };
}
