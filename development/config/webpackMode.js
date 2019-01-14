module.exports = function webpackMode(env){
    if(env === 'development'){
        return {
            mode: 'development',
            watch: true,
            watchOptions: {
                ignored: /node_modules/
            }
        }
    } else if(env === 'production'){
        return {
            mode: 'production',
            watch: false
        }
    }
};
