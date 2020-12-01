<ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Main</li>

        <li>
            <a href="{{ route('home')}}" class="waves-effect">
                <i class="ti-home"></i>
                <span>Dashboard</span>
            </a>
        </li>

        

        <li class="menu-title">Components</li>
        <li>
            <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="ti-archive"></i>
                <span> Data Master </span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
            
                <li><a href="{{ route('pages.index') }}">Pages</a></li>
                <li><a href="{{ route('category.content.index') }}">Content</a></li>
                <li><a href="{{ route('slider.index') }}">Slider Content</a></li>
                <!-- <li><a href="{{ route('dosen.index') }}">Data Dosen</a></li> -->
                <li><a href="{{ route('category.product.index') }}">Produk</a></li>
                                    
            </ul>

            <li>
            <a href="{{ route('web-config') }}" class="waves-effect">
            <i class="ti-settings"></i>
                <span>Web Config</span>
            </a>
            
        </li>
        </li>
        
        
        <li>
            <a href="{{ route('users.index') }}" class="waves-effect">
                <i class="ti-user"></i>
                <span>User</span>
            </a>
            
        </li>

        


        

        

    </ul>